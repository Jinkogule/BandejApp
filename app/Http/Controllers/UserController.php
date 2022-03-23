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
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );
       

        $verif_existencia = DB::table('refeicaos')
            ->where('tipo', $data['tipo'])
            ->where('dia_da_semana', $data['dia_da_semana'])
            ->where('id_usuario', Auth::user()->id)
            ->exists();
       

        $verif_quantidade = (DB::table('refeicaos')->where('id_usuario', Auth::user()->id)->get())->count();



        if ($verif_existencia == true){
            return Redirect::back()->withErrors(['ErroRefeicaoExistente' => 'Já existe uma refeição deste tipo em seus registros.']);
        }
        else{
            if ($verif_quantidade < 10){        
                $check = $this->criaRefeicao($data);
                return redirect("dashboard")->withSuccess('Refeição registrada com sucesso!');
            }
            else{
                return redirect("/naopodemaisque10")->with('MensagemDeErro','Não é possível registrar mais que 10 refeições');
            }
        }

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
        
        $id_refeicao = $request->input('id_refeicao');
        $unidade_bandejao = $request->input('unidade_bandejao');

        DB::table('refeicaos')->where('id', '=', $id_refeicao)->update(['status_confirmacao' => "C"]);
        DB::table('refeicaos')->where('id', $id_refeicao)->update(['unidade_bandejao' => $unidade_bandejao]);
                
        return redirect('/dashboard')->with('message', 'Refeição confirmada com sucesso!');
    }
}
