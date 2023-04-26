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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
            //Administrador
            if (Auth::user()->user_type == 'Administrator'){
                $request->session()->regenerate();
                $request->session()->put('nome', Auth::user()->nome);
                $request->session()->put('id', Auth::user()->id);
                $request->session()->put('user_type', Auth::user()->user_type);
                $request->session()->put('user_email', Auth::user()->email);

                $AdminController = new AdminController();
                return $AdminController->dashboard();  
            }
            //Usuário
            else{
                $request->session()->regenerate();
                $request->session()->put('nome', Auth::user()->nome);
                $request->session()->put('sobrenome', Auth::user()->sobrenome);
                $request->session()->put('id', Auth::user()->id);
                $request->session()->put('user_type', Auth::user()->user_type);
                $request->session()->put('user_email', Auth::user()->email);
                $request->session()->put('unidade_bandejao', Auth::user()->unidade_bandejao);
        
                $UserController = new UserController();
                return $UserController->dashboard();
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

    

    /*Sair*/
    public function sair(){
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}






