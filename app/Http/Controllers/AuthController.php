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
        return View::make('auth.login');
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
    
            /*preenchendo refeições iniciais
            $q_refeicoes = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->count();
            if ($q_refeicoes == 0){
                $check = $this->geraRefeicoes($data);
            }
            preenchendo refeições iniciais*/

            return redirect()->intended('dashboard');
        }
        return redirect("/")->with('erro', 'Dados inseridos são inválidos.');
    }

    /*Cadastro*/
    public function cadastro(){
        return view('auth.cadastro');
    }
      
    public function realizarCadastro(Request $request){  
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
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
            'genero' => $data['genero'],
            'status' => $data['status'],
            'unidade_bandejao' => $data['unidade_bandejao'],
        ]);
    }
    
    public function geraRefeicoes(array $data){
        for ($x = 0; $x <= 30; $x++){
            Refeicao::create([
                'id_usuario' => Auth::user()->id,
                'tipo' => 'almoço',
                'unidade_bandejao' => 'gragoatá',
                'data' => date('d/m/Y'),
                'dia_da_semana' => $x,
                
            ]);
        }

        for ($x = 0; $x <= 30; $x++){
            Refeicao::create([
                'id_usuario' => Auth::user()->id,
                'tipo' => 'janta',
                'unidade_bandejao' => 'gragoatá',
                'data' => date('d/m/Y'),
                'dia_da_semana' => $x,
                
            ]);
        }
    } 

    /*Dashboard*/
    public function dashboard(){
        $hoje = date('Y-m-d');

        if(Auth::check()){
            if (Auth::user()->user_type == 'Administrator'){
                return View::make('admin.dashboard');  // admin dashboard path
            }
            else{
                $events = DB::table('refeicaos')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderBy('data')->orderBy('tipo')->paginate(31);
                return View::make('layouts-user.dashboard')->with('events', $events);  // user dashboard path
            }   
        }
  
        return back()->withErrors([
            'email' => 'auth nao checked',
            'password' => 'auth nao checked'
        ]);
    }

    /*Sair*/
    public function sair(){
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}






