<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user())
        {
            return redirect()->route('signIn');
        }
        if(!$request->user()->active){
            return redirect()->route('signIn')->with('error','Your account is not active');
        }
        if($request->user()->role !== $role){
            abort(403,"You don't have permission to access this page");
        }
        return $next($request);
    }
}
