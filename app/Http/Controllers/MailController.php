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
        $hoje = date('d/m/y');
        /*$users = DB::table('users')->where('id', '!=', '0')->get();*/
        $refeicaos = Refeicao::where('data_visual', '=', $hoje)->get();
        $users = User::whereIn('id', $refeicaos)->get();

        
        
        foreach($users as $user){
            Mail::to($user)->send(new NotifyUserAboutSomething($user));
        }
        
    }
}
