<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function teste_mail(){
        Mail::send('mail.teste', ['teste' => 'teste'], function($m){
            $m->from('BandejApp');
            $m->to('lucaspimenta21@gmail.com');
            $m->subject('Confirme sua presença no almoço de hoje');
        });
    }
}
