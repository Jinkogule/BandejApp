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
        
        
        /*$users = DB::table('users')->where('id', '!=', '0')->get();*/
        $refeicaos = Refeicao::whereDate('data', '=', date('Y-m-d'))->get();
        $users = User::where('id', '!=', '0')->get();

        
        $usersssadas = DB::table('users')
        ->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')
        ->select('users.email')->whereDate('refeicaos.data', '=', date('Y-m-d'))->get();

        echo $usersssadas;
        foreach($users as $user){
            
            Mail::to($user)->send(new NotifyUserAboutSomething($user));
        }
        
    }
}
