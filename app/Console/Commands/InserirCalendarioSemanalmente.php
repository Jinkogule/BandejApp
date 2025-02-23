<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InserirCalendarioSemanalmente extends Command
{
    protected $signature = 'inserir:calendario-semanal';
    protected $description = 'Insere automaticamente os próximos 7 dias úteis no calendário, ignorando sábados e domingos.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Carbon::setLocale('pt_BR');
        $hoje = Carbon::today();

        for ($i = 1; $i <= 7; $i++) {
            $data = $hoje->copy()->addDays($i);
            $diaDaSemana = $data->translatedFormat('l');
            $dataFormatada = $data->format('Y-m-d');
            $diaNumero = $data->dayOfWeek;

            if ($diaNumero == 6 || $diaNumero == 0) {
                continue;
            }

            $existe = DB::table('calendario')->whereDate('data', $dataFormatada)->exists();

            if (!$existe) {
                DB::table('calendario')->insert([
                    'dia_da_semana' => $diaDaSemana,
                    'data' => $dataFormatada,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        $this->info('Os próximos dias úteis foram adicionados ao calendário.');
    }
}

