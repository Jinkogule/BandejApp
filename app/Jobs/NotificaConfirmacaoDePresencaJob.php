<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\NotificaConfirmacaoDePresenca;

class NotificaConfirmacaoDePresencaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /*$users = DB::table('users')->where('id', '!=', '0')->get();*/
        $refeicaos = Refeicao::whereDate('data', '=', date('Y-m-d'))->get();

        $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d'));
        $users = User::whereIn('id', $users_ref_hoje)->get();

        foreach($users as $user){
            
            Mail::to($user)->send(new NotificaConfirmacaoDePresenca($user));
        }  
    }
}
