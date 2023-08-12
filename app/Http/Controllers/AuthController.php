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
    public function realizarLogin(Request $request, AdminController $adminController, UserController $userController){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->regenerate();
            $request->session()->put('nome', $user->nome);
            $request->session()->put('id', $user->id);
            $request->session()->put('user_type', $user->user_type);
            $request->session()->put('user_email', $user->email);

            if ($user->user_type == 'Administrator') {
                return redirect()->route('admin.dashboard');
            } else {
                $request->session()->put('unidade_bandejao', $user->unidade_bandejao);
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->route('login')->with('erro', 'Dados inseridos são inválidos.');
    }

    /*Cadastro*/
    public function viewCadastro(){
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
        $check = $this->criarUsuario($data);

        return redirect()->route('login')->with('sucesso', 'Cadastro realizado com sucesso!');
    }

    public function criarUsuario(array $data){
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

        return redirect()->route('login')->with('sucesso', 'Você saiu com sucesso!');
    }
}






