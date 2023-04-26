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

        @include('layouts-user.components-user.navbar2')

        <br>
        {{ session('nome') }}
        <br>
        {{ session('sobrenome') }}
        <br>
        {{ session('id') }}
        <br>
        {{ session('user_email') }}
        <br>
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
        <div class="">
            <form id="enviar_sugestao_de_melhorias" action="{{ route('enviaSugestaoDeMelhorias') }}" method="POST">
                @csrf
                <input type="hidden" name="nome" id="nome" value="{{ session('nome') }}">
                <input type="hidden" name="sobrenome" id="sobrenome" value="{{ session('sobrenome') }}">
                <input type="hidden" name="id_usuario" id="id_usuario" value="{{ session('id') }}">
                <input type="hidden" name="email" id="email" value="{{ session('user_email') }}">
                
               
                                                   
                <div class="d-grid mx-auto mb-2">
                    <button type="submit" class="btn btn-sm btn-confirmar">Enviar</button>
                </div>
            </form> 
        </div>
    
    </body>
</html>