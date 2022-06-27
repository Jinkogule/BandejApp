<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
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
        /*Notificação de confirmação de presença*/
        $schedule->call(function () {
            $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d', strtotime(' +1 day')));
            $users = User::whereIn('id', $users_ref_hoje)->get();

            foreach($users as $user){
                $refeicaos = Refeicao::where('id_usuario', '=', $user->id)->whereDate('data', '=', date('Y-m-d', strtotime(' +1 day')))->get();
                foreach($refeicaos as $refeicao){
                    Mail::to($user->email)->send(new NotificaConfirmacaoDePresenca($user, $refeicao));
                }
            }
        })->everyMinute();

        /*Delete das refeições que já se passaram*/
        $schedule->call(function () {
            DB::table('refeicaos')->whereDate('data', '<', date('Y-m-d'))->delete();
        })->dailyAt('15:45');
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
