<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if (Auth::user()->user_type == null){
                return $next($request);
            }
            else{
                return redirect('/')->with('message', 'Acesso negado, você não é um usuário');
            }
        }
        else{
            return redirect('/')->with('message', 'Faça o login para acessar o site');
        }
        return $next($request);
    }
}
