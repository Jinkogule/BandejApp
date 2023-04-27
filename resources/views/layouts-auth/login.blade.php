<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp</title>

        <!--Meta Tags -->
        @include('comuns.metatags')

        <!-- Bootstrap CSS -->
        @include('comuns.bootstrap')

        <!--Favicon-->
        @include('comuns.favicon')

        <!-- Estilos (path do arquivo css) -->
        @include('comuns.styles')
        <style>
            #playlist{
                list-style: none;
            }

            #playlist li a{
                color: black;
                text-decoration: none;
            }

            #playlist .current-song a{
                color: blue !important;
            }
        </style>
    </head>

    <body>
        <!--Navbar-->
        @include('comuns.navbar')

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
        
        <div class="container container-login">
            <h4 style="text-align: center;">Acesse o BandejApp</h4>
            <hr>
            <form method="POST" action="{{ route('realizarLogin') }}">
            @csrf
                <div class="form-group mb-3">
                    <label for="email" style="color: #fff;">E-mail:</label>
                    <input type="text" id="email" class="form-control" name="email" required
                        autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group mb-4">
                    <label for="password" style="color: #fff;">Senha:</label>
                    <input type="password" id="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="d-grid mx-auto mb-2">
                    <button type="submit" class="btn btn-success btn-block">Entrar</button>
                </div>
                <hr>
                <a class="nav-link" href="{{ route('cadastro') }}">Não possui uma conta? Cadastre-se</a>
                <a class="nav-link" href="" hidden>Recuperar e-mail ou senha</a>
            </form>     
        </div>
    </body>
</html>