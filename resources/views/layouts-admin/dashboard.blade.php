<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Próximas Refeições</title>

        <!--Meta Tags -->
        @include('comuns.metatags')

        <!-- Bootstrap CSS -->
        @include('comuns.bootstrap')

        <!--Favicon-->
        <link rel="icon" href="/images/favicons/talheres-favicon.png"/>

        <!-- Estilos (path do arquivo css) -->
        @include('comuns.styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard-usuario.css') }}">
        @include('comuns.scripts')
    </head>

    <body>
        <!--Menu-->
        <nav class="navbar navbar1 navbar-expand-md fixed-top">
            <div class="container-fluid container-menu" style="position: relative;">
                <!-- Brand -->
                <a class="navbar-brand navbar-brand-dashboard logo" href="/dashboard">
                    <img src="/images/favicons/talheres-icon.png">
                    
                <!-- Brand -->
                </a>  
                
                <h4 class="bem-vindo centraliza">Bem vindo, {{ session('nome')}}!</h4>
                
                <a class="nav-link" href="{{ route('sair') }}" style="color: #fff !important;">Sair</a>
                
            </div>

        </nav>
        <!--Menu-->
        
        

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
                $q_almoco = DB::table('refeicaos')->select('*')->where('tipo', '=', 'Almoço')->count();
                $q_janta = DB::table('refeicaos')->select('*')->where('tipo', '=', 'Janta')->count();

                $data_banco = $event->data;  
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana_visual = ucfirst($event->dia_da_semana);
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="text-align: center; color: #fff;">{{ $dia_da_semana_visual }} - {{ $data_visual }}</span>
                    </div>
                    
                    <div class="card-body">
                        Quantidade confirmados para almoço: {{ $q_almoco }}
                        <br>
                        Quantidade confirmados para janta: {{ $q_janta }}
                        <br>
                    </div>                       
                </div>         
            @endforeach
            </div>
        </div>
    </body>
</html>