<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlanejamentoMensalController extends Controller
{
    public function planejamentomensal(){
        $unidade_bandejao = Auth::user()->unidade_bandejao;
        //$refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);
        $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(30);


        return View::make('layouts.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao)->with('calendario_dias', $calendario_dias);
        
        
    }
}
