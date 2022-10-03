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

        @include('layouts-user.components-user.navbar2')

        <nav class="navbar navbar2 navbar-expand-md fixed-top">
            <div class="row" style="width: 100%; height: 45px; padding: 0; margin: 0; position: relative;">
                <div class="col botoes-menu border position-relative">
                    <p class="centraliza" style="color: #fff;">Próximas Refeições</p>
                    <a href="/dashboard" class="stretched-link"></a>
                </div>
                <div class="col botoes-menu border position-relative">
                    <p class="centraliza" style="color: #fff;"> Planejamento Mensal</p>
                    <a href="/planejamentomensal" class="stretched-link"></a>
                </div>    
            </div>
        </nav>

        <div class="container-fluid">
            <div class="container container-pm">
                <br>
                <h2 style="text-align: center; color: #fff;">Planejamento Mensal</h2>
                <hr>
                <div style="text-align: center;">
                    <span style="color: #fff;">Selecione as refeições que você pretende realizar no bandejão</span>
                </div>
                <div class="container container2-pm" style="overflow: auto">
                    <br>
                    <div class="row" style="text-align: center;">
                        <div class="col">
                            <form id="selecionarTodasRefeicoes" action="{{ route('selecionarTodasRefeicoes') }}" method="POST">
                                @csrf
                                <input type='checkbox' style="margin-left: 15px;" onchange="document.getElementById('selecionarTodasRefeicoes').submit()"> <span class="card-title">Selecionar todos</span> 
                            </form>
                        </div>
                        <div class="col">
                            <form id="desselecionarTodasRefeicoes" action="{{ route('desselecionarTodasRefeicoes') }}" method="POST">
                                @csrf
                                <input type='checkbox' style="margin-left: 15px;" onchange="document.getElementById('desselecionarTodasRefeicoes').submit()"> <span class="card-title">Desselecionar todos</span>
                            </form>
                        </div>
                    </div>

                    @foreach($calendario_dias as $event)        
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">{{ $event->dia_da_semana }} - {{ $event->data_visual }}</span>
                        </div>
                        
                        <div class="card-body">
                                
                                <?php
                                if (DB::table('refeicaos')->select('*')->where('id_usuario', '=', $user_id)->where('tipo', '=', 'Almoço')->where('data', '=', $event->data)->count() == 1){
                                ?>
                                    <form id="cancelarRefeicaoAlmoco_{{ $event->id }}" action="{{ route('cancelarRefeicaoPlanejamentoAlmoco') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="tipo" value="Almoço">
                                        <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                        <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                        <input type="hidden" name="data" value="{{ $event->data }}">
                                        <input type="hidden" name="data_visual" value="{{ $event->data_visual }}">
                                        <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                        <input type="checkbox" name="checkboxAlmoço_{{ $event->id }}" id="checkboxAlmoço_{{ $event->id }}" onchange="document.getElementById('cancelarRefeicaoAlmoco_{{ $event->id }}').submit()" checked>
                                        <label for="tipo" class="text-shadow">Almoço - {{ $unidade_bandejao }}</label>

                                        <?php
                                        $status_refeicao_dessa_data = DB::table('refeicaos')->select('status_confirmacao')->where('id_usuario', '=', $user_id)->where('data', '=', $event->data)->value('status_confirmacao');
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
                                        <input type="hidden" name="data_visual" value="{{ $event->data_visual }}">
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
                            if (DB::table('refeicaos')->select('*')->where('id_usuario', '=', $user_id)->where('tipo', '=', 'Janta')->where('data', '=', $event->data)->count() == 1){
                            ?>
                                <form id="cancelarRefeicaoJanta_{{ $event->id }}" action="{{ route('cancelarRefeicaoPlanejamentoJanta') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="Janta">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                    <input type="hidden" name="data" value="{{ $event->data }}">
                                    <input type="hidden" name="data_visual" value="{{ $event->data_visual }}">
                                    <input type="hidden" name="id_usuario" value="{{ $user_id }}">

                                    <input type="checkbox" name="checkboxJanta_{{ $event->id }}" id="checkboxJanta_{{ $event->id }}" onchange="document.getElementById('cancelarRefeicaoJanta_{{ $event->id }}').submit()" checked>
                                    <label for="tipo" class="text-shadow">Janta - {{ $unidade_bandejao }}</label>

                                    <?php
                                    $status_refeicao_dessa_data = DB::table('refeicaos')->select('status_confirmacao')->where('id_usuario', '=', $user_id)->where('data', '=', $event->data)->value('status_confirmacao');
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
                                    <input type="hidden" name="data_visual" value="{{ $event->data_visual }}">
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
            </div>
        </div>
       
        <script>
            $(document).ready(function (){
                $("form").submit(function (event){
                    event.preventDefault();
                    alert('teste chegou até aqui dentro da funcao ajax, mas fora do controller');
                    var tipo = document.getElementById("tipo").value;
                    var unidade_bandejao = document.getElementById("unidade_bandejao").value;
                    var dia_da_semana = document.getElementById("dia_da_semana").value;
                    var data = document.getElementById("data").value;
                    var data_visual = document.getElementById("data_visual").value;
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
                            data_visual:data_visual,
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
                
        }
        </script>
    </body>
</html>