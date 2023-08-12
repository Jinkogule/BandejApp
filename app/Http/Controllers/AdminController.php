<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use App\Models\Cardapio;
use App\Models\Calendario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard(){
        $hoje = date('Y-m-d');

        if(Auth::check()){
            $calendario_dias = Calendario::whereNotNull('data')->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(10);

            $cardapios = [];
            $registrados = [];
            $confirmados = [];
            foreach ($calendario_dias as $event) {
                /*cardapios*/
                $cardapio = $event->cardapio;
                $cardapios[$event->id] = $cardapio;

                /*registrados*/
                $registrados_almoco_gragoata = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Gragoatá')->where('tipo', '=', 'Almoço')->count();
                $registrados_janta_gragoata = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Gragoatá')->where('tipo', '=', 'Janta')->count();
                $registrados_total_gragoata = $registrados_almoco_gragoata + $registrados_janta_gragoata;

                $registrados_almoco_pv = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Praia Vermelha')->where('tipo', '=', 'Almoço')->count();
                $registrados_janta_pv = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Praia Vermelha')->where('tipo', '=', 'Janta')->count();
                $registrados_total_pv = $registrados_almoco_pv + $registrados_janta_pv;

                $registrados_almoco_reitoria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Reitoria')->where('tipo', '=', 'Almoço')->count();
                $registrados_janta_reitoria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Reitoria')->where('tipo', '=', 'Janta')->count();
                $registrados_total_reitoria = $registrados_almoco_reitoria + $registrados_janta_reitoria;

                $registrados_almoco_veterinaria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Veterinária')->where('tipo', '=', 'Almoço')->count();
                $registrados_janta_veterinaria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Veterinária')->where('tipo', '=', 'Janta')->count();
                $registrados_total_veterinaria = $registrados_almoco_veterinaria + $registrados_janta_veterinaria;

                $registrados_almoco_huap = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'HUAP')->where('tipo', '=', 'Almoço')->count();
                $registrados_janta_huap = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'HUAP')->where('tipo', '=', 'Janta')->count();
                $registrados_total_huap = $registrados_almoco_huap + $registrados_janta_huap;

                $registrados_almoco_total = $registrados_almoco_gragoata + $registrados_almoco_pv + $registrados_almoco_reitoria + $registrados_almoco_veterinaria + $registrados_almoco_huap;
                $registrados_janta_total = $registrados_janta_gragoata + $registrados_janta_pv + $registrados_janta_reitoria + $registrados_janta_veterinaria + $registrados_janta_huap;

                $registrados_total = $registrados_total_gragoata + $registrados_total_pv + $registrados_total_reitoria + $registrados_total_veterinaria + $registrados_total_huap;

                $registrados[$event->id] = [
                    'registrados_almoco_gragoata' => $registrados_almoco_gragoata,
                    'registrados_janta_gragoata' => $registrados_janta_gragoata,
                    'registrados_total_gragoata' => $registrados_total_gragoata,

                    'registrados_almoco_pv' => $registrados_almoco_pv,
                    'registrados_janta_pv' => $registrados_janta_pv,
                    'registrados_total_pv' => $registrados_total_pv,

                    'registrados_almoco_reitoria' => $registrados_almoco_reitoria,
                    'registrados_janta_reitoria' => $registrados_janta_reitoria,
                    'registrados_total_reitoria' => $registrados_total_reitoria,

                    'registrados_almoco_veterinaria' => $registrados_almoco_veterinaria,
                    'registrados_janta_veterinaria' => $registrados_janta_veterinaria,
                    'registrados_total_veterinaria' => $registrados_total_veterinaria,

                    'registrados_almoco_huap' => $registrados_almoco_huap,
                    'registrados_janta_huap' => $registrados_janta_huap,
                    'registrados_total_huap' => $registrados_total_huap,

                    'registrados_almoco_total' => $registrados_almoco_total,
                    'registrados_janta_total' => $registrados_janta_total,

                    'registrados_total' => $registrados_total
                ];

                /*confirmados*/
                $confirmados_almoco_gragoata = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Gragoatá')->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_janta_gragoata = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Gragoatá')->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_total_gragoata = $confirmados_almoco_gragoata + $confirmados_janta_gragoata;

                $confirmados_almoco_pv = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Praia Vermelha')->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_janta_pv = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Praia Vermelha')->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_total_pv = $confirmados_almoco_pv + $confirmados_janta_pv;

                $confirmados_almoco_reitoria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Reitoria')->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_janta_reitoria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Reitoria')->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_total_reitoria = $confirmados_almoco_reitoria + $confirmados_janta_reitoria;

                $confirmados_almoco_veterinaria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Veterinária')->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_janta_veterinaria = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'Veterinária')->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_total_veterinaria = $confirmados_almoco_veterinaria + $confirmados_janta_veterinaria;

                $confirmados_almoco_huap = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'HUAP')->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_janta_huap = DB::table('refeicoes')->select('*')->where('data', '=', $event->data)->where('unidade_bandejao', '=', 'HUAP')->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();
                $confirmados_total_huap = $confirmados_almoco_huap + $confirmados_janta_huap;

                $confirmados_almoco_total = $confirmados_almoco_gragoata + $confirmados_almoco_pv + $confirmados_almoco_reitoria + $confirmados_almoco_veterinaria + $confirmados_almoco_huap;
                $confirmados_janta_total = $confirmados_janta_gragoata + $confirmados_janta_pv + $confirmados_janta_reitoria + $confirmados_janta_veterinaria + $confirmados_janta_huap;

                $confirmados_total = $confirmados_total_gragoata + $confirmados_total_pv + $confirmados_total_reitoria + $confirmados_total_veterinaria + $confirmados_total_huap;

                $confirmados[$event->id] = [
                    'confirmados_almoco_gragoata' => $confirmados_almoco_gragoata,
                    'confirmados_janta_gragoata' => $confirmados_janta_gragoata,
                    'confirmados_total_gragoata' => $confirmados_total_gragoata,

                    'confirmados_almoco_pv' => $confirmados_almoco_pv,
                    'confirmados_janta_pv' => $confirmados_janta_pv,
                    'confirmados_total_pv' => $confirmados_total_pv,

                    'confirmados_almoco_reitoria' => $confirmados_almoco_reitoria,
                    'confirmados_janta_reitoria' => $confirmados_janta_reitoria,
                    'confirmados_total_reitoria' => $confirmados_total_reitoria,

                    'confirmados_almoco_veterinaria' => $confirmados_almoco_veterinaria,
                    'confirmados_janta_veterinaria' => $confirmados_janta_veterinaria,
                    'confirmados_total_veterinaria' => $confirmados_total_veterinaria,

                    'confirmados_almoco_huap' => $confirmados_almoco_huap,
                    'confirmados_janta_huap' => $confirmados_janta_huap,
                    'confirmados_total_huap' => $confirmados_total_huap,

                    'confirmados_almoco_total' => $confirmados_almoco_total,
                    'confirmados_janta_total' => $confirmados_janta_total,

                    'confirmados_total' => $confirmados_total
                ];


            }

            return View::make('layouts-admin.dashboard')->with('calendario_dias', $calendario_dias)->with('cardapios', $cardapios)->with('registrados', $registrados)->with('confirmados', $confirmados);
        }

        return redirect()->route('login')->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');

    }

    public function listarSugestoesDeMelhorias(){
        $sugestoes = DB::table('sugestao_de_melhorias')->select('*')->get();

        return View::make('layouts-admin.sugestoes-de-melhorias')->with('sugestoes', $sugestoes);
    }

    public function salvarCardapio(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'prato_principal' => 'required|string',
            'guarnicao' => 'required|string',
            'acompanhamentos' => 'nullable|string',
            'sobremesa' => 'nullable|string',
            'salada_1' => 'nullable|string',
            'salada_2' => 'nullable|string',
            'refresco' => 'nullable|string'
        ]);

        if ($request->has('id')) {
            $cardapio = Cardapio::find($request->input('id'));
            $cardapio->fill($request->all());
        } else {
            $cardapio = new Cardapio($request->all());
        }

        $cardapio->save();

        return redirect()->route('admin.dashboard')->with('sucesso', 'Cardápio salvo com sucesso!');
    }
}
