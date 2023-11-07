<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Publicar Aviso</title>

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
        <!--Navbar-->
        @include('layouts-admin.components-admin.navbar1')

        <!--Mensagens-->
        @include('comuns.mensagens')

        <div class="container container-sugestao mb-4">
            <h4 style="text-align: center;">Publicar Aviso</h4>
            <hr>
            <form action="{{ route('publicarAviso') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="assunto" style="color: #fff;">Título:</label>
                    <input type="text" placeholder="Título do aviso" name="titulo" id="titulo" class="form-control" maxlength='100' value="{{ old('titulo') }}" required>
                </div>

                <div class="form-group mb-4">
                    <label for="sugestao" style="color: #fff;">Conteúdo:</label>
                    <textarea placeholder="Conteúdo do aviso" name="conteudo" id="conteudo" class="form-control" rows="5" maxlength='2000' value="{{ old('conteudo') }}" required></textarea>
                    <small id="emailHelp" style="color: #E0E0E0 !important;" class="form-text text-muted">Obs.: máximo de 2000 caracteres.</small>
                </div>

                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-sm btn-confirmar">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>
