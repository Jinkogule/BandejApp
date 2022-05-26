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
        <input type="hidden" name="_token" id="_token" value="{{csrf_token() }}">
        <!--Navbar-->
        @include('dashboard-usuario.navbar1')

        @include('dashboard-usuario.navbar2')

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
                <div class="container container2-pm" style="overflow: auto">
                    <br>
                    
                    
                    <input type='checkbox' class='checkall' onClick='toggle(this)' style="margin-left: 15px;"> <span class="card-title">Selecionar/desselecionar todos</span>
                    
                        @foreach($calendario_dias as $event)
                        
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title" style="text-align: center; color: #fff;">{{ $event->dia_da_semana }} - {{ $event->data_visual }}</span>
                            </div>
                            
                            <div class="card-body">
                                <form id="registrarRefeicaoAlmoco_{{ $event->id }}" action="{{ route('refeicao') }}" method="POST">
                                @csrf
                                    <input type="checkbox" name="checkbocAlmoço" id="checkbocAlmoço" onchange="document.getElementById('registrarRefeicaoAlmoco_{{ $event->id }}').submit()">
                                    <label for="tipo" class="text-shadow">Almoço - {{ $unidade_bandejao }}</label>
                                    <input type="hidden" name="tipo" value="Almoço">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="dia_da_semana" value="{{ $event->dia_da_semana }}">
                                    <input type="hidden" name="data" value="{{ $event->data }}">
                                    <input type="hidden" name="data_visual" value="{{ $event->data_visual }}">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="id_usuario" value="{{ $user_id }}">
                                    
                                    <br>
                                


                                    
                                </form>
                                <hr>
                                <form id="registrarRefeicao" action="{{ route('refeicao') }}" method="POST">
                                @csrf
                                    <input type="checkbox" id="tipo" name="tipo" value="Jantar" onchange="document.getElementById('registrarRefeicao').submit()">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <label for="tipo" class="text-shadow">Janta - {{ $unidade_bandejao }}</label>
                                    <input type="submit" value="Send Request">
                                </form>      
                            </div>                       
                        </div>
                                
                        @endforeach 
                    </div>
                </div>
            </div>
       

            <script>

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