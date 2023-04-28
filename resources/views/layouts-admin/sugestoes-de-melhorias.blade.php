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
                <strong>{{ $event->assunto }}</strong>
                <br>
                {{ $event->sugestao }}
                <br><br>
                <small style="color: #E0E0E0 !important;" class="text-muted">Sugestão enviada por {{ $event->nome }} {{ $event->sobrenome }} ({{ $event->email }}) em {{ $event->created_at }}</small>   
            @endforeach
            <br>
            </div>
        </div>
    </body>
</html>