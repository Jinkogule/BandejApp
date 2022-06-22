<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotificaConfirmacaoDePresenca extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notificacaoDeConfirmacaoDePresenca:send';

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
        $refeicaos = Refeicao::whereDate('data', '=', date('Y-m-d'))->get();

        $users_ref_hoje = DB::table('users')->join('refeicaos', 'users.id', '=', 'refeicaos.id_usuario')->select('users.id')->whereDate('refeicaos.data', '=', date('Y-m-d'));
        $users = User::whereIn('id', $users_ref_hoje)->get();
        
        foreach($users as $user){
            
            Mail::to($user)->send(new NotificaConfirmacaoDePresenca($user));
        }
    }
}
