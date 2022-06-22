<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DateTime;
use App\Models\User;
use App\Models\Refeicao;
use App\Mail\NotificaConfirmacaoDePresenca;

class MailController extends Controller
{
    public function teste_mail(){
        $hoje = new DateTime(date('Y-m-d'));

        $amanha = $hoje->modify('+1 day');
        $amanha_str =  $amanha->format('Y-m-d');
        

        $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', $amanha_str);
        $users = User::whereIn('id', $users_ref_hoje)->get();

        foreach($users as $user){
            $refeicaos = Refeicao::where('id_usuario', '=', $user->id)->whereDate('data', '=', $amanha_str)->get();
            foreach($refeicaos as $refeicao){
                Mail::to($user->email)->send(new NotificaConfirmacaoDePresenca($user, $refeicao));
            }
        }
    }
}
