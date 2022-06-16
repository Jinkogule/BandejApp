<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class MailController extends Controller
{
    public function teste_mail(){
        $usuarios = DB::table('users')->where('id', '!=', '0')->get();

        
            
        $emails = User::select('email')
        ->where('id','!=', '0')
        ->get('email');

        Mail::send('mail.confirmar-presenca', ['confirmar-presenca' => 'confirmar-presenca'], function($m) use ($emails) {
            $m->from('bandejaoaplicativo@gmail.com');    
            $m->to($emails);
            $m->subject('Confirme sua presença no almoço de hoje');
        });
        
    }
}
