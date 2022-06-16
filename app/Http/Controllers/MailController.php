<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function teste_mail(){
        $usuarios = DB::table('users')->where('id', '!=', '0')->get();
        $usuarios_email = $usuarios->email;
        
        foreach ($usuarios_email as $usuario_email){
            Mail::send('mail.confirmar-presenca', ['confirmar-presenca' => 'confirmar-presenca'], function($m){
                $m->from('bandejaoaplicativo@gmail.com');
                $m->to($usuario_email);
                $m->subject('Confirme sua presença no almoço de hoje');
            });
        }
    }
}
