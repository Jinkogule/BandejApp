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
    
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'Dados inseridos são inválidos',
            'password' => 'Dados inseridos são inválidos'
        ]);
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
        
        $check = $this->geraRefeicoes($data);
        
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
                'id_usuario' => '7',
                'tipo' => 'almoço',
                'unidade_bandejao' => 'gragoatá',
                'dia_da_semana' => $x,
                
            ]);
        }

        for ($x = 0; $x <= 30; $x++){
            Refeicao::create([
                'id_usuario' => '7',
                'tipo' => 'janta',
                'unidade_bandejao' => 'gragoatá',
                'dia_da_semana' => $x,
                
            ]);
        }
    } 

    /*Dashboard*/
    public function dashboard(){
        if(Auth::check()){
            if (Auth::user()->user_type == 'Administrator'){
                return View::make('admin.dashboard');  // admin dashboard path
            }
            else{
                return View::make('user.dashboard');  // member dashboard path
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






