<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Refeicao;

class PlanejamentoMensalController extends Controller
{
    public function planejamentomensal(){
        if(Auth::check()){
            $unidade_bandejao = Auth::user()->unidade_bandejao;
            $user_id = Auth::user()->id;
            //$refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);
            $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(100);

            return View::make('layouts-user.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao)->with('user_id', $user_id)->with('calendario_dias', $calendario_dias);
        }
  
        return redirect("/")->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
    }

    public function ajax_submit(Request $request){
        Refeicao::create([
            'id_usuario' => $request->id_usuario,
            'tipo' => $request->tipo,
            'unidade_bandejao' => $request->unidade_bandejao,
            'data' => $request->data,
            'data_visual' => $request->data_visual,
            'dia_da_semana' => $request->dia_da_semana,
            
        ]);

        return response()->json(['success'=>'Form is successfully submitted!']);
    }
}
