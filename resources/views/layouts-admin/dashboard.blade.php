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
        página do administrador 
    </body>
</html>