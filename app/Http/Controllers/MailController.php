<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function teste_mail(){
        $usuarios = DB::table('users')->where('id', '!=', '0')->get();

        foreach ($usuarios as $event){
            Mail::send('mail.confirmar-presenca', ['confirmar-presenca' => 'confirmar-presenca'], function($m){
                $m->from('bandejaoaplicativo@gmail.com');
                $m->to($event->email);
                $m->subject('Confirme sua presença no almoço de hoje');
            });
        }
    }
}
