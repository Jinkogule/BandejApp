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

            $data_timestamp =  substr($event->created_at, 10);
            $data_banco_timestamp = $data_timestamp;  
            $data_visual_timestamp = date("d/m/y", strtotime($data_banco_timestamp));
            ?>

            <div class="container conteudo-sugestoes">
                <h5>{{ $event->assunto }}</h5>
                
                {{ $event->sugestao }}
                <br><br>
                <small style="color: #D9D9D9 !important; text-align: left;" class="text-muted">Sugestão enviada por {{ $event->nome }} {{ $event->sobrenome }} (<a href="mailto:{{ $event->email }}">{{ $event->email }}</a>) em {{ $data_visual_timestamp }}, às {{ $horario_timestamp }}h.</small>
            </div>  
            <br>
            @endforeach
        </div>
    </body>
</html>