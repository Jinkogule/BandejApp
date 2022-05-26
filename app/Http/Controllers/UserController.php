<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{
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

    
    //verifica se verifica se um cliente possui mais ou menos que 10 refeições
    public function verifQuantidadeRefeicoes(){

    }
    //verifica se determinada refeição de um cliente já está em seus registros


    public function criaRefeicao(array $data){

        return Refeicao::create([
            'id_usuario' => Auth::user()->id,
            'tipo' => $data['tipo'],
            'unidade_bandejao' => $data['unidade_bandejao'],
            'dia_da_semana' => $data['dia_da_semana'],
            'cardapio' => $data['cardapio'],
        ]);
    }

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
}
