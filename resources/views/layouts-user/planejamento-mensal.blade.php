<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Planejamento Mensal</title>

        <!--Meta Tags -->
        @include('comuns.metatags')

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <!--Favicon-->
        @include('comuns.favicon')

        <!-- Estilos (path do arquivo css) -->
        @include('comuns.styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/dashboard-usuario.css') }}">

        <!-- JQuery com o AJAX-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    </head>

    <body>
        <!--Navbar-->
        @include('layouts-user.components-user.navbar1')

        <!--@include('layouts-user.components-user.navbar2')-->

        <!--Mensagens-->
        @include('comuns.mensagens')

        <br>

        <div class="container-fluid container-pm">
            <br>
            <h2 style="text-align: center; color: #fff;">Planejamento Mensal</h2>
            <hr>
            <div style="text-align: center;">
                <span style="color: #fff;">Selecione as refeições que você pretende realizar no bandejão</span>
            </div>
            <div class="container-fluid container2-pm" style="overflow: auto">
                <div class="grid-container-element">
                    <div>
                        <form id="selecionarTodasRefeicoes" action="{{ route('selecionarTodasRefeicoes') }}" method="POST">
                            @csrf
                            <input type='checkbox' onchange="document.getElementById('selecionarTodasRefeicoes').submit()"> <span class="selecionar-desselecionar-todos">Selecionar todos</span>
                        </form>
                    </div>
                    <div>
                        <form id="desselecionarTodasRefeicoes" action="{{ route('desselecionarTodasRefeicoes') }}" method="POST">
                            @csrf
                            <input type='checkbox' onchange="document.getElementById('desselecionarTodasRefeicoes').submit()"> <span class="selecionar-desselecionar-todos">Desselecionar todos</span>
                        </form>
                    </div>
                </div>


                @foreach($calendario_dias as $event)
                <?php
                $data_banco = $event->data;
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana_visual = ucfirst($event->dia_da_semana);
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="text-align: center; color: #fff;">{{ $dia_da_semana_visual }} - {{ $data_visual }}</span>
                    </div>

                    <div class="card-body">

                            <?php
                            if (DB::table('refeicoes')->select('*')->where('id_usuario', '=', $user_id)->where('tipo', '=', 'Almoço')->where('data', '=', $event->data)->count() == 1){
                            ?>
                                <form id="cancelarRefeicaoAlmoco_{{ $event->id }}" action="{{ route('cancelarRefeicaoPlanejamentoAlmoco') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="Almoço">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                    <input type="hidden" name="data" value="{{ $event->data }}">
                                    <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                    <input type="checkbox" name="checkboxAlmoço_{{ $event->id }}" id="checkboxAlmoço_{{ $event->id }}" onchange="document.getElementById('cancelarRefeicaoAlmoco_{{ $event->id }}').submit()" checked>
                                    <label for="tipo" class="text-shadow">Almoço - {{ $unidade_bandejao }}</label>

                                    <?php
                                    $status_refeicao_dessa_data = DB::table('refeicoes')->select('status_confirmacao')->where('id_usuario', '=', $user_id)->where('data', '=', $event->data)->where('tipo', '=', 'Almoço')->value('status_confirmacao');
                                    if ($status_refeicao_dessa_data == "C"){
                                    ?>
                                        <script>
                                        document.getElementById("checkboxAlmoço_{{ $event->id }}").disabled = true;
                                        </script>
                                    <?php
                                    }
                                    ?>
                                </form>
                            <?php
                            }
                            else {
                            ?>
                                <form id="registrarRefeicaoAlmoco_{{ $event->id }}" action="{{ route('registraRefeicao') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="Almoço">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                    <input type="hidden" name="data" value="{{ $event->data }}">
                                    <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                    <input type="checkbox" name="checkboxAlmoço_{{ $event->id }}" id="checkboxAlmoço_{{ $event->id }}" onchange="document.getElementById('registrarRefeicaoAlmoco_{{ $event->id }}').submit()">
                                    <label for="tipo" class="text-shadow">Almoço - {{ $unidade_bandejao }}</label>
                                </form>
                            <?php
                            }
                            ?>

                        <hr>
                        <!--Janta-->
                        <?php
                        if (DB::table('refeicoes')->select('*')->where('id_usuario', '=', $user_id)->where('tipo', '=', 'Janta')->where('data', '=', $event->data)->count() == 1){
                        ?>
                            <form id="cancelarRefeicaoJanta_{{ $event->id }}" action="{{ route('cancelarRefeicaoPlanejamentoJanta') }}" method="POST">
                                @csrf
                                <input type="hidden" name="tipo" value="Janta">
                                <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                <input type="hidden" name="data" value="{{ $event->data }}">
                                <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                <input type="checkbox" name="checkboxJanta_{{ $event->id }}" id="checkboxJanta_{{ $event->id }}" onchange="document.getElementById('cancelarRefeicaoJanta_{{ $event->id }}').submit()" checked>
                                <label for="tipo" class="text-shadow">Janta - {{ $unidade_bandejao }}</label>

                                <?php
                                $status_refeicao_dessa_data = DB::table('refeicoes')->select('status_confirmacao')->where('id_usuario', '=', $user_id)->where('data', '=', $event->data)->where('tipo', '=', 'Janta')->value('status_confirmacao');
                                if ($status_refeicao_dessa_data == "C"){
                                ?>
                                    <script>
                                    document.getElementById("checkboxJanta_{{ $event->id }}").disabled = true;
                                    </script>
                                <?php
                                }
                                ?>
                            </form>
                        <?php
                        }
                        else {
                        ?>

                            <form id="registrarRefeicaoJanta_{{ $event->id }}" action="{{ route('registraRefeicao') }}" method="POST">
                                @csrf
                                <input type="hidden" name="tipo" value="Janta">
                                <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                <input type="hidden" name="data" value="{{ $event->data }}">
                                <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                <input type="checkbox" name="checkboxJanta_{{ $event->id }}" id="checkboxJanta_{{ $event->id }}" onchange="document.getElementById('registrarRefeicaoJanta_{{ $event->id }}').submit()">
                                <label for="tipo" class="text-shadow">Janta - {{ $unidade_bandejao }}</label>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            @endforeach
            </div>
            <!--
            <div style="text-align: center;">
                <span style="color: #fff;">Após selecionar as refeições, <a href="/dashboard" style="color: #8dd4e0;">retorne à página principal</a>.</span>
            </div>
                    -->
            <?php
        if (DB::table('refeicoes')->select('*')->where('id_usuario', '=', $user_id)->exists() == 1){
        ?>


                <form action="/user/dashboard" class="d-grid mx-auto mb-2 pb-2">
                    <input type="submit"type="submit" class="btn btn-confirmar btn-block" value="Próxima etapa" />
                </form>

        <?php
        }
        else{
        ?>

                <form action="/user/dashboard" class="d-grid mx-auto mb-2 pb-2">
                    <input disabled type="submit"type="submit" class="btn btn-confirmar btn-block" value="Próxima etapa" />
                </form>

        <?php
        }
        ?>
        </div>

        <script>
            /* tentativa submit por ajax
            $(document).ready(function (){
                $("form").submit(function (event){
                    event.preventDefault();
                    alert('teste chegou até aqui dentro da funcao ajax, mas fora do controller');
                    var tipo = document.getElementById("tipo").value;
                    var unidade_bandejao = document.getElementById("unidade_bandejao").value;
                    var dia_da_semana = document.getElementById("dia_da_semana").value;
                    var data = document.getElementById("data").value;

                    var id_usuario = document.getElementById("id_usuario").value;


                    var _token = document.getElementById('_token').value;
                    $.ajax({

                        url:'../ajax_submit',
                        type: 'post',
                        data: {
                            _token:_token,
                            tipo:tipo,
                            unidade_bandejao:unidade_bandejao,
                            dia_da_semana:dia_da_semana,
                            data:data,

                            id_usuario:id_usuario,
                        },

                        success:function(data){

                        }
                    });
                })
            })
        function submitFormAlmoco(){
            $.ajax({
                type: "POST",
                url:'../registrarRefeicao',
                data: $("#registrarRefeicaoAlmoco").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    alert(data); // show response from the php script.
                }
            });
            return false;

        }*/
        </script>
    </body>
</html>
