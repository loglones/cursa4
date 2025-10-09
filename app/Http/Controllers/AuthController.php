<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller{

    public function showLoginForm()
    {
        return view('sigIn');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Auth::user();

            if(!$user->hasVerifiedEmail()){
                Auth::logout();
                return redirect()->route('verification.notice')->with('error', 'Пожалуйста подтвердите свой Email перед входом');
            }

            if(!$user->active){
                Auth::logout();
                return back()->with('error','Ваш аккаунт деактивирован');
            }
            return redirect()->route('home')->with('success', 'Добро пожаловать!');
        }
//        $user = User::where('email',$request->email)->first();
//        if($user && Hash::check($request->password, $user->password)){
//            if(!$user->active){
//                return back()->with('eror','Your account is not active');
//            }
//            Auth::login($user);
//            $request->session()->regenerate();
//
//            return  redirect()->route('home')->with('success','You are now logged in');
//        }
        return back()->with('error','Неверные email или пароль.');
    }

    public function  showRegisterForm()
    {
        return view('signUp');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'fio' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'fio' => $request->fio,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_USER,
            'active' => false,
            'email_verified_at' => null,
        ]);
        $user->sendEmailVerificationNotification();


        Auth::login($user);

        return redirect()->route('verification.notice')
            ->with('success', 'Регистрация успешна! На ваш email отправлена ссылка для подтверждения.');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}
