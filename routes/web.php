<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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
Route::get('cadastro', [AuthController::class, 'viewCadastro'])->name('cadastro');
Route::post('realizarCadastro', [AuthController::class, 'realizarCadastro'])->name('realizarCadastro');
Route::get('sair', [AuthController::class, 'sair'])->name('sair');

/*Rotas do admin*/
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('sugestoes_de_melhorias', [AdminController::class, 'listarSugestoesDeMelhorias'])->name('admin.sugestoes_de_melhorias');

    Route::post('salvarCardapio', [AdminController::class, 'salvarCardapio'])->name('salvarCardapio');

    Route::get('publicacao_de_avisos', [AdminController::class, 'viewPublicacaoDeAvisos'])->name('admin.publicacao_de_avisos');
    Route::post('publicarAviso', [AdminController::class, 'publicarAviso'])->name('publicarAviso');
});

Route::prefix('user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('planejamento_mensal', [UserController::class, 'planejamentoMensal'])->name('user.planejamento_mensal');

    Route::post('cancelarRefeicao', [UserController::class, 'cancelarRefeicao'])->name('cancelarRefeicao');
    Route::post('confirmarRefeicao', [UserController::class, 'confirmarRefeicao'])->name('confirmarRefeicao');

    Route::post('avaliarRefeicao', [UserController::class, 'avaliarRefeicao'])->name('avaliarRefeicao');

    Route::post('cancelarRefeicaoPlanejamento', [UserController::class, 'cancelarRefeicaoPlanejamento'])->name('cancelarRefeicaoPlanejamento');
    Route::post('cancelarRefeicaoPlanejamentoAlmoco', [UserController::class, 'cancelarRefeicaoPlanejamentoAlmoco'])->name('cancelarRefeicaoPlanejamentoAlmoco');
    Route::post('cancelarRefeicaoPlanejamentoJanta', [UserController::class, 'cancelarRefeicaoPlanejamentoJanta'])->name('cancelarRefeicaoPlanejamentoJanta');

    Route::post('registraRefeicao', [UserController::class, 'registrarRefeicao'])->name('registraRefeicao');

    Route::post('selecionarTodasRefeicoes', [UserController::class, 'selecionarTodasRefeicoes'])->name('selecionarTodasRefeicoes');
    Route::post('desselecionarTodasRefeicoes', [UserController::class, 'desselecionarTodasRefeicoes'])->name('desselecionarTodasRefeicoes');

    Route::post('cancela-refeicao', [UserController::class, 'cancelarRefeicao'])->name('cancelarRefeicao');
    Route::post('confirma-refeicao', [UserController::class, 'confirmarRefeicao'])->name('confirmarRefeicao');

    Route::get('sugestao_de_melhorias', [UserController::class, 'viewSugestaoDeMelhorias'])->name('user.sugestao_de_melhorias');
    Route::post('enviarSugestaoDeMelhorias', [UserController::class, 'enviarSugestaoDeMelhorias'])->name('enviarSugestaoDeMelhorias');

    Route::get('avaliacao_de_bandejao', [UserController::class, 'viewAvaliacaoDeBandejao'])->name('user.avaliacao_de_bandejao');
    Route::post('avaliarBandejao', [UserController::class, 'avaliarBandejao'])->name('avaliarBandejao');

    Route::get('avisos', [UserController::class, 'listarAvisos'])->name('user.avisos');

    Route::get('/teste-mail', [MailController::class, 'teste_mail']);

    Route::post('/ajax_submit', [PlanejamentoMensalController::class, 'ajax_submit'])->name('ajax_submit');
});

/*Commands*/
Route::get('/processar-refeicoes', function (Request $request) {
    if ($request->query('key') !== env('PROCESSAR_REFEICOES_KEY')) {
        return Response::json(['error' => 'Acesso negado'], 403);
    }

    Artisan::call('refeicoes:processar-diarias');

    return Response::json([
        'message' => 'Refeicoes processadas com sucesso!',
        'status' => 200
    ]);
});

Route::get('/processar-calendario', function (Request $request) {
    if ($request->query('key') !== env('PROCESSAR_CALENDARIO_KEY')) {
        return Response::json(['error' => 'Acesso negado'], 403);
    }

    Artisan::call('inserir:calendario-semanal');

    return Response::json([
        'message' => 'Calendario semanal inserido com sucesso!',
        'status' => 200
    ]);
});








