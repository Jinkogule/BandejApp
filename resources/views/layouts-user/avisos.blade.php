<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Avisos informativos</title>

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
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

        <!-- JQuery com o AJAX-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    </head>

    <body>
        <!--Navbar-->
        @include('layouts-user.components-user.navbar1')

        <br>

        <div class="container container-visualizar-sugestoes mb-4" style="color: #fff;">
            <h4 style="text-align: center;">Avisos informativos</h4>
            <hr>

            @foreach($avisos as $event)
            <?php
            $horario_timestamp =  substr($event->created_at, -8);

            $data_timestamp =  substr($event->created_at, 10);
            $data_banco_timestamp = $data_timestamp;
            $data_visual_timestamp = date("d/m/y", strtotime($data_banco_timestamp));
            ?>

            <div class="container conteudo-sugestoes">
                <h5>{{ $event->titulo }}</h5>

                {{ $event->conteudo }}
                <br><br>
                <small style="color: #D9D9D9 !important; text-align: left;" class="text-muted">Publicado em {{ $data_visual_timestamp }}, às {{ $horario_timestamp }}h.</small>
            </div>
            <br>
            @endforeach
        </div>

    </body>
</html>
