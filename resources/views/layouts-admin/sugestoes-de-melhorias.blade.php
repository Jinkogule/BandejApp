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
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        @include('comuns.scripts')
    </head>

    <body>
        @include('layouts-admin.components-admin.navbar1')
        
        

        <div class="container container-visualizar-sugestoes mb-4">
            <h4 style="text-align: center;">Sugestões de Melhorias</h4>
            <hr>
                
            @foreach($sugestoes as $event)
                
                {{ $event->nome }} {{ $event->sobrenome }}
                <br><br><br>
                {{ $event->assunto }}
                <br><br>
                {{ $event->sugestao }}       
            @endforeach
            </div>
        </div>
    </body>
</html>