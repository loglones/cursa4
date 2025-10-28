<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //фасад для работы с аутентификацией
use Illuminate\Support\Facades\Storage; //фасад для работы с файлами
use Illuminate\Support\Facades\Validator; //фасад для валидации

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); //текущий авторизированный пользователь
        return view('profile', compact('user'));
    }
    public function update(Request $request){
        $user = Auth::user(); //получаем текущего юзера

        //валидация данных
        $validator = Validator::make($request->all(), [
            'fio' => 'required|string|max:255',
            'number_phone' => 'nullable|string|max:16',
            'address' => 'nullable|string|max:500',
        ]);
        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $updateData = [
                'fio' => $request->fio,
                'number_phone' => $request->number_phone,
                'address' => $request->address,
            ];

            $result = $user->update($updateData);

            $user->refresh();

            return redirect()->route('profile')->with('success', 'Профиль успешно обновлен!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ошибка при обновлении профиля: ' . $e->getMessage());
        }
    }
    public function updatePhoto(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->with('error','Ошибка загрузки фото. Проверьте формат и размер файла');
        }

        try{

            if($user->photo && Storage::disk('public')->exists('img/' . $user->photo)){
                Storage::disk('public')->delete('img/' . $user->photo);
            }// удаляем фото если уже стоит

            if($request->hasFile('photo')){ //сохраняю новое фото
                $photo = $request -> file('photo');
                $filename = 'user_' . $user->id . '_' . time() . '.' .$photo->getClientOriginalExtension();

                $photo->storeAs('img', $filename, 'public');//возможно ошибка с путями,для того что бы сохранить фото в файл

                $user->update(['photo' => $filename]);//обновляю запись в бд

            }
            return redirect()->route('profile')->with('success', 'Фото профиля успешно обновлено');
        }
        catch (\Exception $e){
            return redirect()->back()->with('error','Ошибка при сохранении фото' . $e->getMessage());
        }
    }
}
