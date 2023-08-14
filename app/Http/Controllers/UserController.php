<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refeicao;
use App\Models\Sugestao_de_melhoria;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller{
    public function dashboard(){
        $q_refeicoes = DB::table('refeicoes')->select('*')->where('id_usuario', '=', Auth::user()->id)->count();

        //Vai para o Planejamentomensal caso não possua refeições registradas
        if ($q_refeicoes == 0){
            return redirect()->intended(route('user.planejamento_mensal'));
        }
        //Vai para o Dashboard caso possua refeições registradas
        else{
            $hoje = date('Y-m-d');

            if(Auth::check()){
                $events = Refeicao::where('id_usuario', '=', Auth::user()->id)->orderBy('data')->orderBy('tipo')->paginate(20);

                $events2 = DB::table('refeicoes')->select('*')->where('id_usuario', '=', Auth::user()->id)->orderByDesc('data')->orderByDesc('tipo')->paginate(20);
                $verif_null = DB::table('refeicoes')->select('*')->where('id_usuario', '=', Auth::user()->id)->exists();

                $cardapios = [];
                foreach ($events as $event) {
                    $cardapio = $event->cardapio;
                    $cardapios[$event->id] = $cardapio;
                }

                return View::make('layouts-user.dashboard')
                    ->with('events', $events)
                    ->with('events2', $events2)
                    ->with('verif_null', $verif_null)
                    ->with('cardapios', $cardapios);
            }


            return redirect()->route('login')->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
        }
    }

    /*-------------------------------------------------------------------------Funções Dashboard-------------------------------------------------------------------------*/
    public function cancelarRefeicao(Request $request){

        $id_refeicao =  $request->input('id_refeicao');

        DB::table('refeicoes')->delete($id_refeicao);

        return redirect()->route('user.dashboard')->with('sucesso', 'Refeição cancelada com sucesso!');
    }

    public function confirmarRefeicao(Request $request){
        $data = $request->all();

        $request->validate([
            'id_refeicao' => 'required',
            'unidade_bandejao' => 'required']
        );

        DB::table('refeicoes')->where('id', $data['id_refeicao'])->update(['status_confirmacao' => 'C','unidade_bandejao' => $data['unidade_bandejao']]);

        return redirect()->route('user.dashboard')->with('sucesso', 'Refeição confirmada com sucesso!');
    }

    public function avaliarRefeicao(Request $request){
        $data = $request->all();

        $request->validate([
            'id_refeicao' => 'required',
            'avaliacao' => 'required',
            'avaliacao_detalhada' => 'nullable']
        );

        DB::table('refeicoes')->where('id', $data['id_refeicao'])->update(['avaliacao' => $data['avaliacao'],'avaliacao_detalhada' => $data['avaliacao_detalhada']]);

        return redirect()->route('user.dashboard')->with('sucesso', 'Refeição avaliada com sucesso!');
    }
    /*-------------------------------------------------------------------------Funções Planejamento Mensal-------------------------------------------------------------------------*/
    public function planejamentoMensal(){
        if(Auth::check()){
            $unidade_bandejao = Auth::user()->unidade_bandejao;
            $user_id = Auth::user()->id;
            //$refeicoes = DB::table('refeicoes')->select('*')->where('id_usuario', '=', $id_usuario)->paginate(10);
            $calendario_dias = DB::table('calendario')->select('*')->where('data', '!=', NULL)->where('dia_da_semana', '!=', 'Sábado')->where('dia_da_semana', '!=', 'Domingo')->orderBy('data')->paginate(10);

            return View::make('layouts-user.planejamento-mensal')->with('unidade_bandejao', $unidade_bandejao)->with('user_id', $user_id)->with('calendario_dias', $calendario_dias);
        }

        return redirect()->route('login')->with('erro', 'Usuário não logado. Realize o login para acessar sua área privada do aplicativo.');
    }
    /*
    public function ajax_submit(Request $request){
        Refeicao::create([
            'id_usuario' => $request->id_usuario,
            'tipo' => $request->tipo,
            'unidade_bandejao' => $request->unidade_bandejao,
            'data' => $request->data,
            'dia_da_semana' => $request->dia_da_semana,

        ]);

        return response()->json(['success'=>'Form is successfully submitted!']);
    }
    */
    public function registrarRefeicao(Request $request){

        $data = $request->all();

        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        Refeicao::create([
            'id_usuario' => $data['id_usuario'],
            'tipo' => $data['tipo'],
            'unidade_bandejao' => $data['unidade_bandejao'],
            'data' => $data['data'],
            'dia_da_semana' => $data['dia_da_semana'],
        ]);

        return redirect()->route('user.planejamento_mensal')->with('sucesso', 'Refeição registrada com sucesso!');
    }

    public function cancelarRefeicaoPlanejamentoAlmoco(Request $request){

        $data = $request->all();

        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        DB::table('refeicoes')->where('id_usuario', '=', $data['id_usuario'])->where('tipo', '=', 'Almoço')->where('data', '=', $data['data'])->delete();

        return redirect()->route('user.planejamento_mensal')->with('sucesso', 'Refeição cancelada com sucesso!');
    }

    public function cancelarRefeicaoPlanejamentoJanta(Request $request){

        $data = $request->all();

        $request->validate([
            'id_usuario' => 'required',
            'tipo' => 'required',
            'unidade_bandejao' => 'required',
            'dia_da_semana' => 'required']
        );

        DB::table('refeicoes')->where('id_usuario', '=', $data['id_usuario'])->where('tipo', '=', 'Janta')->where('data', '=', $data['data'])->delete();

        return redirect()->route('user.planejamento_mensal')->with('sucesso', 'Refeição cancelada com sucesso!');
    }

    public function criaRefeicao(array $data){
        return Refeicao::create([
            'id_usuario' => Auth::user()->id,
            'tipo' => $data['tipo'],
            'unidade_bandejao' => $data['unidade_bandejao'],
            'dia_da_semana' => $data['dia_da_semana']
        ]);
    }

    public function selecionarTodasRefeicoes(Request $request){

        $calendario = DB::table('calendario')->select('*')->paginate(10);

        foreach ($calendario as $event) {
            if (DB::table('refeicoes')->where('id_usuario', '=', Auth::user()->id)->where('tipo', '=', 'Almoço')->where('data', '=', $event->data)->exists() == 0){
                Refeicao::create([
                    'id_usuario' => Auth::user()->id,
                    'tipo' => 'Almoço',
                    'unidade_bandejao' => Auth::user()->unidade_bandejao,
                    'data' => $event->data,
                    'dia_da_semana' => $event->dia_da_semana,
                ]);
            }
        }
        foreach ($calendario as $event) {
            if (DB::table('refeicoes')->where('id_usuario', '=', Auth::user()->id)->where('tipo', '=', 'Janta')->where('data', '=', $event->data)->exists() == 0){
                Refeicao::create([
                    'id_usuario' => Auth::user()->id,
                    'tipo' => 'Janta',
                    'unidade_bandejao' => Auth::user()->unidade_bandejao,
                    'data' => $event->data,
                    'dia_da_semana' => $event->dia_da_semana,
                ]);
            }
        }

        return redirect()->route('user.planejamento_mensal')->with('sucesso', 'Refeições registradas com sucesso!');
    }

    public function desselecionarTodasRefeicoes(Request $request){

        DB::table('refeicoes')->where('id_usuario', '=', Auth::user()->id)->where('status_confirmacao', '!=', 'C')->delete();

        return redirect()->route('user.planejamento_mensal')->with('sucesso', 'Refeições removidas com sucesso!');
    }

    /*-------------------------- Páginas e funções das sugestões de melhorias e cardápio --------------------------*/
    public function viewSugestaoDeMelhorias(){
        return View::make('layouts-user.sugestao-de-melhorias');
    }

    public function enviarSugestaoDeMelhorias(Request $request){
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'id_usuario' => 'required',
            'email' => 'required',
            'assunto' => 'required',
            'sugestao' => 'required',
        ]);

        $data = $request->all();
        $check = $this->criaSugestao($data);

        return redirect()->route('user.sugestao_de_melhorias')->with('sucesso', 'Sugestão enviada com sucesso!');
    }

    public function criaSugestao(array $data){

        return Sugestao_de_melhoria::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'id_usuario' => $data['id_usuario'],
            'email' => $data['email'],
            'assunto' => $data['assunto'],
            'sugestao' => $data['sugestao'],

        ]);
    }

    /*-------------------------- Páginas e funções das avaliações de Bandejão --------------------------*/
    public function viewAvaliacaoDeBandejao(){
        return View::make('layouts-user.avaliacao-de-bandejao');
    }

    public function avaliarBandejao(Request $request){
        $request->validate([
            'nome' => 'required',
            'sobrenome' => 'required',
            'id_usuario' => 'required',
            'email' => 'required',
            'atendimento_nota' => 'required|integer|min:1|max:5',
            'atendimento_comentario' => 'nullable|string|max:1000',
            'ambiente_nota' => 'required|integer|min:1|max:5',
            'ambiente_comentario' => 'nullable|string|max:1000',
            'cardapios_nota' => 'required|integer|min:1|max:5',
            'cardapios_comentario' => 'nullable|string|max:1000',
            'fila_nota' => 'required|integer|min:1|max:5',
            'fila_comentario' => 'nullable|string|max:1000',
            'comida_nota' => 'required|integer|min:1|max:5',
            'comida_comentario' => 'nullable|string|max:1000',
            'outro_topico_nota' => 'required|integer|min:1|max:5',
            'outro_topico_comentario' => 'nullable|string|max:1000'
        ]);

        $data = $request->all();
        $check = $this->criaAvaliacaoDeBandejao($data);

        return redirect()->route('user.avaliacao_de_bandejao')->with('sucesso', 'Avaliação enviada com sucesso!');
    }

    public function criaAvaliacaoDeBandejao(array $data){

        return Avaliacao::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'id_usuario' => $data['id_usuario'],
            'email' => $data['email'],
            'atendimento_nota' => $data['atendimento_nota'],
            'atendimento_comentario' => $data['atendimento_comentario'],
            'ambiente_nota' => $data['ambiente_nota'],
            'ambiente_comentario' => $data['ambiente_comentario'],
            'cardapios_nota' => $data['cardapios_nota'],
            'cardapios_comentario' => $data['cardapios_comentario'],
            'fila_nota' => $data['fila_nota'],
            'fila_comentario' => $data['fila_comentario'],
            'comida_nota' => $data['comida_nota'],
            'comida_comentario' => $data['comida_comentario'],
            'outro_topico_nota' => $data['outro_topico_nota'],
            'outro_topico_comentario' => $data['outro_topico_comentario']
        ]);
    }
}
