<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Sugestão de Melhorias</title>

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

        <!-- JQuery com o AJAX-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <!--Navbar-->
        @include('layouts-user.components-user.navbar1')

        <!--@include('layouts-user.components-user.navbar2')-->

        @if(session()->has('message'))
            <div class="alert alert-success msg-sucesso">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(session()->has('erro'))
            <div class="alert alert-danger msg-erro">
                {{ session()->get('erro') }}
            </div>
        @endif
        <div class="container container-sugestao mb-4">
            <h4 style="text-align: center;">Sugestão de Melhoria</h4>
            <hr>
            <form action="{{ route('enviarSugestaoDeMelhorias') }}" method="POST">
                @csrf
                <input type="hidden" name="nome" id="nome" value="{{ session('nome') }}">
                <input type="hidden" name="sobrenome" id="sobrenome" value="{{ session('sobrenome') }}">
                <input type="hidden" name="id_usuario" id="id_usuario" value="{{ session('id') }}">
                <input type="hidden" name="email" id="email" value="{{ session('user_email') }}">

                <div class="form-group mb-2">
                    <label for="assunto" style="color: #fff;">Assunto:</label>
                    <input type="text" placeholder="Assunto" name="assunto" id="assunto" class="form-control" maxlength='500' value="{{ old('assunto') }}" required>
                    <small id="emailHelp" style="color: #E0E0E0 !important;" class="form-text text-muted">Obs.: máximo de 500 caracteres.</small>
                </div>

                <div class="form-group mb-4">
                    <label for="sugestao" style="color: #fff;">Sugestão:</label>
                    <textarea placeholder="Deixe aqui sua sugestão." name="sugestao" id="sugestao" class="form-control" rows="5" maxlength='2000' value="{{ old('sugestao') }}" required></textarea>
                    <small id="emailHelp" style="color: #E0E0E0 !important;" class="form-text text-muted">Obs.: máximo de 2000 caracteres.</small>
                </div>
                                      
                <div class="d-grid mx-auto">
                    <button type="submit" class="btn btn-sm btn-confirmar">Enviar</button>
                </div>
            </form> 
        </div>
    
    </body>
</html>