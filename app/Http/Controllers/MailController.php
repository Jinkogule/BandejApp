<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Refeicao;
use App\Mail\NotifyUserAboutSomething;

class MailController extends Controller
{
    public function teste_mail(){
        $hoje = date('y/m/d');
        /*$users = DB::table('users')->where('id', '!=', '0')->get();*/
        $refeicaos = Refeicao::where('data_visual', '=', $hoje)->get();
        $users = User::where('id', '!=', '0')->get();

        
        /*$usersssadas = DB::table('users')
        ->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')
        ->select('users.email')->where('refeicaos.data_visual', '=', $hoje);*/

        echo $refeicaos;
        foreach($users as $user){
            
            Mail::to($user)->send(new NotifyUserAboutSomething($user));
        }
        
    }
}
