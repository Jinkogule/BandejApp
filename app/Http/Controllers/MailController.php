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
            echo $user->email;
        }
    }
}
