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
               
            @foreach($sugestoes as $event)
            <?php
                $horario_timestamp =  substr($event->created_at, -8);  

                
            ?>
            <div class="container conteudo-sugestoes">
                <h5>{{ $event->assunto }}</h5>
                
                {{ $event->sugestao }}
                <br><br>
                <small style="color: #E0E0E0 !important;" class="text-muted">Sugestão enviada por {{ $event->nome }} {{ $event->sobrenome }} ({{ $event->email }}) em {{ $event->created_at }}, horário {{ $horario_timestamp }}; </small>
            </div>  
            <br>
            @endforeach
            
            
        </div>
    </body>
</html>