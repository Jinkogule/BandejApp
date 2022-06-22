<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Refeicao;
use App\Mail\NotificaConfirmacaoDePresenca;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {
            $refeicaos = Refeicao::whereDate('data', '=', date('Y-m-d'))->get();

            $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d'));
            $users = User::whereIn('id', $users_ref_hoje)->get();

            foreach($users as $user){
                
                Mail::to($user)->send(new NotificaConfirmacaoDePresenca($user));
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
