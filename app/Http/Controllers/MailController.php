<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Mail\NotifyUserAboutSomething;

class MailController extends Controller
{
    public function teste_mail(){
        $users = User::select('users')->where('id', '!=', '0')->get();

        
        
        foreach($users as $user){
            Mail::to($user)->send(new NotifyUserAboutSomething($user));
        }
        
    }
}
