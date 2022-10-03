<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{
    /*-------------------------------------------------------------------------Funções Dashboard-------------------------------------------------------------------------*/
    public function cancelarRefeicao(Request $request){
        
        $id_refeicao =  $request->input('id_refeicao');
        
        DB::table('refeicaos')->delete($id_refeicao);

        return redirect('/dashboard')->with('message', 'Refeição cancelada com sucesso!');
    }

    public function confirmarRefeicao(Request $request){
        $data = $request->all();

        $request->validate([
            'id_refeicao' => 'required',
            'unidade_bandejao' => 'required']
        );

        DB::table('refeicaos')->where('id', $data['id_refeicao'])->update(['status_confirmacao' => "C"]);
        DB::table('refeicaos')->where('id', $data['id_refeicao'])->update(['unidade_bandejao' => $data['unidade_bandejao']]);
                
        return redirect('/dashboard')->with('message', 'Refeição confirmada com sucesso!');
    }
    /*-------------------------------------------------------------------------Funções Planejamento Mensal-------------------------------------------------------------------------*/
    public function registrarRefeicao(Request $request){

        $data = $request->all();
       
        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        Refeicao::create([
            'id_usuario' => $data['id_usuario'],
            'tipo' => $data['tipo'],
            'unidade_bandejao' => $data['unidade_bandejao'],
            'data' => $data['data'],
            'data_visual' => $data['data_visual'],
            'dia_da_semana' => $data['dia_da_semana'],
            
        ]);

        return redirect('/planejamentomensal')->with('message', 'Refeição registrada com sucesso!');
    }

    public function cancelarRefeicaoPlanejamentoAlmoco(Request $request){

        $data = $request->all();
       
        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        DB::table('refeicaos')->where('id_usuario', '=', $data['id_usuario'])->where('tipo', '=', 'Almoço')->where('data', '=', $data['data'])->delete();
        
        return redirect('/planejamentomensal')->with('message', 'Refeição cancelada com sucesso!');
    }

    public function cancelarRefeicaoPlanejamentoJanta(Request $request){

        $data = $request->all();
       
        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        DB::table('refeicaos')->where('id_usuario', '=', $data['id_usuario'])->where('tipo', '=', 'Janta')->where('data', '=', $data['data'])->delete();
        
        return redirect('/planejamentomensal')->with('message', 'Refeição cancelada com sucesso!');
    }

    public function criaRefeicao(array $data){
        return Refeicao::create([
            'id_usuario' => Auth::user()->id,
            'tipo' => $data['tipo'],
            'unidade_bandejao' => $data['unidade_bandejao'],
            'dia_da_semana' => $data['dia_da_semana'],
            'cardapio' => $data['cardapio'],
        ]);
    }


    public function selecionarTodasRefeicoes(Request $request){

        $calendario = DB::table('calendario')->select('*')->get();

        foreach ($calendario as $event) {
            if (DB::table('refeicaos')->where('id_usuario', '=', Auth::user()->id)->where('tipo', '=', 'Almoço')->where('data', '=', $event->data)->exists() == 0){
                Refeicao::create([
                    'id_usuario' => Auth::user()->id,
                    'tipo' => 'Almoço',
                    'unidade_bandejao' => Auth::user()->unidade_bandejao,
                    'data' => $event->data,
                    'data_visual' => $event->data_visual,
                    'dia_da_semana' => $event->dia_da_semana,     
                ]);
            }
        }
        foreach ($calendario as $event) {
            if (DB::table('refeicaos')->where('id_usuario', '=', Auth::user()->id)->where('tipo', '=', 'Janta')->where('data', '=', $event->data)->exists() == 0){
                Refeicao::create([
                    'id_usuario' => Auth::user()->id,
                    'tipo' => 'Janta',
                    'unidade_bandejao' => Auth::user()->unidade_bandejao,
                    'data' => $event->data,
                    'data_visual' => $event->data_visual,
                    'dia_da_semana' => $event->dia_da_semana,           
                ]);
            }
        }
        
        return redirect('/planejamentomensal')->with('message', 'Refeições registradas com sucesso!');
    }

    public function desselecionarTodasRefeicoes(Request $request){

        DB::table('refeicaos')->where('id_usuario', '=', Auth::user()->id)->where('status_confirmacao', '!=', 'C')->delete();

        return redirect('/planejamentomensal')->with('message', 'Refeições removidas com sucesso!');
    }



}
