<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use App\Models\Cardapio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard(){
        $hoje = date('Y-m-d');

        if(Auth::check()){
            $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(10);

            return View::make('layouts-admin.dashboard')->with('calendario_dias', $calendario_dias);  // user dashboard path
        }

        return redirect()->route('login')->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');

    }

    public function listarSugestoesDeMelhorias(){
        $sugestoes = DB::table('sugestao_de_melhorias')->select('*')->get();

        return View::make('layouts-admin.sugestoes-de-melhorias')->with('sugestoes', $sugestoes);
    }

    public function definirCardapio(Request $request){

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

        $cardapio = new Cardapio($request->all());
        $cardapio->save();

        return redirect()->route('admin.dashboard')->with('sucesso', 'Cardápio definido com sucesso!');
    }
}
