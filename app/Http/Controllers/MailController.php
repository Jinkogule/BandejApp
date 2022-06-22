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
        $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d', strtotime(' +1 day')));
        $users = User::whereIn('id', $users_ref_hoje)->get();

        foreach($users as $user){
            $refeicaos = Refeicao::where('id_usuario', '=', $user->id)->whereDate('data', '=', date('Y-m-d', strtotime(' +1 day')))->get();
            foreach($refeicaos as $refeicao){
                Mail::to($user->email)->send(new NotificaConfirmacaoDePresenca($user, $refeicao));
            }
        }
    }
}
