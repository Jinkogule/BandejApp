<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Refeicao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AuthController extends Controller{
    public function index(){
        return View::make('layouts-auth.login');
    } 

    /*Login*/
    public function realizarLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('nome', Auth::user()->nome);
            $request->session()->put('id', Auth::user()->id);
            $request->session()->put('user_type', Auth::user()->user_type);
            $request->session()->put('user_email', Auth::user()->email);
            $request->session()->put('unidade_bandejao', Auth::user()->unidade_bandejao);
    
            $q_refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->count();

            if ($q_refeicoes == 0){
                return redirect()->intended('planejamentomensal');
            }
            else{
                return redirect()->intended('layouts-user.dashboard');
            }
        }
        return redirect("/")->with('erro', 'Dados inseridos são inválidos.');
    }

    /*Cadastro*/
    public function cadastro(){
        return view('layouts-auth.cadastro');
    }
      
    public function realizarCadastro(Request $request){  
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:20',
        ]);
           
        $data = $request->all();
        $check = $this->criaUsuario($data);
        
        
        return redirect("/")->with('message', 'Cadastro realizado com sucesso!');
    }

    public function criaUsuario(array $data){
        return User::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'data_nascimento' => $data['data_nascimento'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'peso' => $data['peso'],
            'altura' => $data['altura'],
            'status' => $data['status'],
            'unidade_bandejao' => $data['unidade_bandejao'],
        ]);
    }

    /*Dashboard*/
    public function dashboard(){
        $hoje = date('Y-m-d');

        if(Auth::check()){
            if (Auth::user()->user_type == 'Administrator'){
                return View::make('layouts-admin.dashboard');  // admin dashboard path
            }
            else{
                $events = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderBy('data')->orderBy('tipo')->paginate(20);
                $events2 = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderByDesc('data')->orderByDesc('tipo')->paginate(20);
                $verif_null = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->exists();

                return View::make('layouts-user.dashboard')->with('events', $events)->with('events2', $events2)->with('verif_null', $verif_null);  // user dashboard path
            }   
        }
  
        return redirect("/")->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
    }

    public function planejamentomensal(){
        if(Auth::check()){
            $unidade_bandejao = Auth::user()->unidade_bandejao;
            $user_id = Auth::user()->id;
            //$refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);
            $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(10);

            return View::make('layouts-user.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao)->with('user_id', $user_id)->with('calendario_dias', $calendario_dias);
        }
  
        return redirect("/")->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
    }

    /*Sair*/
    public function sair(){
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}






