<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class PlanejamentoMensalController extends Controller
{
    public function planejamentomensal(){
        $unidade_bandejao = Auth::user()->unidade_bandejao;
        //$refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);


        return View::make('layouts.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao);
        
        
    }
}
