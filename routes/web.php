<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
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
Route::get('sair', [AuthController::class, 'sair'])->name('sair');

/*Rotas do admin*/
Route::prefix('admin')::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard']);

});


Route::prefix('user')::middleware(['auth', 'isUser'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard']);
    Route::get('planejamentomensal', [UserController::class, 'planejamentomensal']);

    Route::post('cancelarRefeicao', [UserController::class, 'cancelarRefeicao'])->name('cancelarRefeicao');
    Route::post('confirmarRefeicao', [UserController::class, 'confirmarRefeicao'])->name('confirmarRefeicao');

    Route::post('cancelarRefeicaoPlanejamento', [UserController::class, 'cancelarRefeicaoPlanejamento'])->name('cancelarRefeicaoPlanejamento');
    Route::post('cancelarRefeicaoPlanejamentoAlmoco', [UserController::class, 'cancelarRefeicaoPlanejamentoAlmoco'])->name('cancelarRefeicaoPlanejamentoAlmoco');
    Route::post('cancelarRefeicaoPlanejamentoJanta', [UserController::class, 'cancelarRefeicaoPlanejamentoJanta'])->name('cancelarRefeicaoPlanejamentoJanta');

    Route::post('registraRefeicao', [UserController::class, 'registrarRefeicao'])->name('registraRefeicao');

    Route::post('selecionarTodasRefeicoes', [UserController::class, 'selecionarTodasRefeicoes'])->name('selecionarTodasRefeicoes');
    Route::post('desselecionarTodasRefeicoes', [UserController::class, 'desselecionarTodasRefeicoes'])->name('desselecionarTodasRefeicoes');
    
    
    Route::post('cancela-refeicao', [UserController::class, 'cancelarRefeicao'])->name('cancelarRefeicao');
    Route::post('confirma-refeicao', [UserController::class, 'confirmarRefeicao'])->name('confirmarRefeicao');
    
    Route::get('sugestaodemelhorias', [UserController::class, 'sugestaodemelhorias']);
    Route::post('enviaSugestaoDeMelhorias', [UserController::class, 'enviaSugestaoDeMelhorias'])->name('enviaSugestaoDeMelhorias');


    Route::get('/teste-mail', [MailController::class, 'teste_mail']);
    
    Route::post('/ajax_submit', [PlanejamentoMensalController::class, 'ajax_submit'])->name('ajax_submit');
});






