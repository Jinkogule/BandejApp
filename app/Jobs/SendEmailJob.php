<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class SendEmailJob implements ShouldQueue
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
        $usuarios = DB::table('users')->where('id', '!=', '0');

        foreach ($usuarios as $event){
            Mail::send('mail.confirmar-presenca', ['confirmar-presenca' => 'confirmar-presenca'], function($m){
                $m->from('bandejaoaplicativo@gmail.com');
                $m->to('{{ $event->email }}');
                $m->subject('Confirme sua presença no almoço de hoje');
            });
        }
        
    }
}
