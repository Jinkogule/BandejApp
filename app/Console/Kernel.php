<?php

namespace App\Console;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
            Mail::send('mail.teste', ['teste' => 'teste'], function($m){
                $m->from('bandejaoaplicativo@gmail.com');
                $m->to('lucaspimenta21@gmail.com');
                $m->subject('Confirme sua presença no almoço de hoje');
            });
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
