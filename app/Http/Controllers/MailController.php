<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function teste_mail(){
        $usuarios = DB::table('users')->where('id', '!=', '0')->get();

        foreach ($usuarios as $user){
            $user_mail = $user->email;
            Mail::send('mail.confirmar-presenca', ['confirmar-presenca' => 'confirmar-presenca'], function($m){
                $m->from('bandejaoaplicativo@gmail.com');
                $m->to('lucaspimenta21@gmail.com');
                $m->subject('Confirme sua presença no almoço de hoje');
            });
        }
    }
}
