<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificaConfirmacaoDePresenca;
use App\Models\User;
use App\Models\Refeicao;
use Carbon\Carbon;

class ProcessarRefeicoesDiarias extends Command
{
    protected $signature = 'refeicoes:processar-diarias';
    protected $description = 'Processa as refeições diárias: envia notificações, atualiza status e limpa dados antigos';

    public function handle()
    {
        $amanha = Carbon::now()->addDay()->toDateString();
        $hoje = Carbon::now()->toDateString();

        $users_ref_hoje = DB::table('users')->join('refeicoes', 'users.id', '=', 'refeicoes.id_usuario')->whereDate('refeicoes.data', '=', $amanha)->pluck('users.id');

        $users = User::whereIn('id', $users_ref_hoje)->get();

        DB::table('refeicoes')->whereDate('data', '=', $amanha)->update(['status_confirmacao' => 'P']);

        /*Temporariamente desativado
        foreach ($users as $user) {
            $refeicoes = Refeicao::where('id_usuario', $user->id)->whereDate('data', $amanha)->get();

            foreach ($refeicoes as $refeicao) {
                Mail::to($user->email)->send(new NotificaConfirmacaoDePresenca($user, $refeicao));
            }
        }
        */

        DB::table('refeicoes')->whereDate('data', '<', $hoje)->delete();
        DB::table('calendario')->whereDate('data', '<', $hoje)->delete();

        $this->info('Processamento de refeições concluído.');
    }
}
