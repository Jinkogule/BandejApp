<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SendEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::send('mail.teste', ['teste' => 'teste'], function($m){
            $m->from('bandejaoaplicativo@gmail.com');
            $m->to('lucaspimenta21@gmail.com');
            $m->subject('Confirme sua presença no almoço de hoje');
        });
    }
}
