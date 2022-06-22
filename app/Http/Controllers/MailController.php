<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Refeicao;
use App\Mail\NotificaConfirmacaoDePresenca;

class MailController extends Controller
{
    public function teste_mail(){
        
        
        /*$users = DB::table('users')->where('id', '!=', '0')->get();*/
        $refeicaos = Refeicao::whereDate('data', '=', date('Y-m-d'))->get();

        $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d'));
        $users = User::whereIn('id', $users_ref_hoje)->get();

        foreach($users as $user){
            $refeicao = Refeicao::where('id_usuario', '=', '1')->whereDate('data', '=', date('Y-m-d'))->get();
            Mail::to($user)->send(new NotificaConfirmacaoDePresenca($user, $refeicao));
        }
        
    }
}
