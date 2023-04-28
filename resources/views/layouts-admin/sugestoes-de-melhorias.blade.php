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
        
        

        <div class="container container-visualizar-sugestoes mb-4" style="color: #fff;">
            <h4 style="text-align: center;">Sugestões de Melhorias</h4>
            <hr>
            <div class="conteudo-sugestoes">   
            @foreach($sugestoes as $event)
                <strong  style="color: black !important;">Sugestão enviada por</strong> {{ $event->nome }} {{ $event->sobrenome }} ({{ $event->email }}):
                <br>
                <strong style="color: black !important;">Assunto:</strong> {{ $event->assunto }}
                <br>
                <strong style="color: black !important;">Sugestão:</strong> {{ $event->sugestao }}       
            @endforeach
            <hr>
            </div>
        </div>
    </body>
</html>