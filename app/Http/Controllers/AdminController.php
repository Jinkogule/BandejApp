<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard(){
        $hoje = date('Y-m-d');

        if(Auth::check()){
            if (Auth::user()->user_type == 'Administrator'){
                return View::make('layouts-admin.dashboard');  // admin dashboard path
            }
            else{
                $events = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderBy('data')->orderBy('tipo')->paginate(20);
                $events2 = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderByDesc('data')->orderByDesc('tipo')->paginate(20);
                $verif_null = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->exists();

                return View::make('layouts-user.dashboard')->with('events', $events)->with('events2', $events2)->with('verif_null', $verif_null);  // user dashboard path
            }   
        }
  
        return redirect("/")->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
    }
}
