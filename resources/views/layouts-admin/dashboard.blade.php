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
        <!--Navbar-->
        <nav class="navbar navbar1 navbar-expand-md fixed-top">
            <div class="container-fluid container-menu" style="position: relative;">
                <!-- Menu -->
                <div class="dropdown">
                    <!-- dropdown menu-->
                    <ul class="main">
                        <li class="desplegable">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="" class="curso">Menu</a>
                            <ul class="grupo-desplegable">
                                @include('layouts-admin.components-admin.itens-menu')                                  
                            </ul>
                        </li> 
                    </ul>
                </div>

                <!-- Brand -->
                <a class="navbar-brand navbar-brand-dashboard logo" href="/dashboard">
                    <img src="/images/favicons/talheres-icon.png">
                </a> 

                <h4 class="bem-vindo">Bem vindo, {{ session('nome')}}!</h4>
                 
                <a class="nav-link" href="{{ route('sair') }}" style="color: #fff !important;">Sair</a>
                
            </div>

        </nav>
        <!--Navbar-->
        
        

        <div class="container-fluid container-pm">
            <br>
            <h2 style="text-align: center; color: #fff;">Calendário de Refeições</h2>
            <div class="container-fluid container2-pm" style="overflow: auto">
                
                @foreach($calendario_dias as $event)
                
                <?php
                $q_almoco = DB::table('refeicaos')->select('*')->where('data', '=', $event->data)->where('tipo', '=', 'Almoço')->count();
                $q_janta = DB::table('refeicaos')->select('*')->where('data', '=', $event->data)->where('tipo', '=', 'Janta')->count();

                $q_almoco_confirmados = DB::table('refeicaos')->select('*')->where('data', '=', $event->data)->where('tipo', '=', 'Almoço')->where('status_confirmacao', '=', 'C')->count();
                $q_janta_conrirmados = DB::table('refeicaos')->select('*')->where('data', '=', $event->data)->where('tipo', '=', 'Janta')->where('status_confirmacao', '=', 'C')->count();

                $data_banco = $event->data;  
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana_visual = ucfirst($event->dia_da_semana);
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="card-title" style="text-align: center; color: #fff;">{{ $dia_da_semana_visual }} - {{ $data_visual }}</span>
                    </div>
                    
                    <div class="card-body" style="color: #fff;">
                        Registrados para almoço: {{ $q_almoco }}
                        <br>
                        Registrados para janta: {{ $q_janta }}
                        <br>
                        <br>
                        Confirmados para almoço: {{ $q_almoco_confirmados }}
                        <br>
                        Confirmados para janta: {{ $q_janta_conrirmados }}
                    </div>                       
                </div>         
            @endforeach
            </div>
        </div>
    </body>
</html>