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
        $user_id = Auth::user()->id;
        //$refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);
        $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(30);
        

        return View::make('layouts.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao)->with('user_id', $user_id)->with('calendario_dias', $calendario_dias);
        
        
    }

    public function ajax_submit(){
        alert('teste chegou até aqui');
        $tipo = $_POST['tipo'];
        $unidade_bandejao = $_POST['unidade_bandejao'];
        $dia_da_semana = $_POST['dia_da_semana'];
        $data = $_POST['data'];
        $data_visual = $_POST['data_visual'];
        $id_usuario = $_POST['id_usuario'];

        Refeicao::create([
            'id_usuario' => $id_usuario,
            'tipo' => $tipo,
            'unidade_bandejao' => $unidade_bandejao,
            'data' => $data,
            'data_visual' => $data_visual,
            'dia_da_semana' => $dia_da_semana,
            
        ]);

        return json_encode($tipo, $unidade_bandejao, $dia_da_semana, $data, $data_visual, $id_usuario);
    }
}
