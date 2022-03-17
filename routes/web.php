<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanejamentoMensalController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Auth*/
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('realizarLogin', [AuthController::class, 'realizarLogin'])->name('realizarLogin');
Route::get('cadastro', [AuthController::class, 'cadastro'])->name('cadastro');
Route::post('realizarCadastro', [AuthController::class, 'realizarCadastro'])->name('realizarCadastro');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('sair', [AuthController::class, 'sair'])->name('sair');

/*Rotas do admin*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');

});

/*Rotas do usuário*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');

});

Route::get('planejamentomensal', [PlanejamentoMensalController::class, 'planejamentomensal']);


Route::post('refeicao', [UserController::class, 'registrarRefeicao'])->name('refeicao');
Route::post('cancela-refeicao', [UserController::class, 'cancelarRefeicao'])->name('cancelarRefeicao');
Route::post('confirma-refeicao', [UserController::class, 'confirmarRefeicao'])->name('confirmarRefeicao'); 




