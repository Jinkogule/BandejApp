<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Cadastro</title>

        <!--Meta Tags -->
        @include('comuns.metatags')

        <!-- Bootstrap CSS -->
        @include('comuns.bootstrap')

        <!--Favicon-->
        @include('comuns.favicon')

        <!-- Estilos (path do arquivo css) -->
        @include('comuns.styles')
    </head>

    <body>
        <!--Navbar-->
        @include('comuns.navbar')

        <div class="container container-cadastro mb-4">
            <br><h4 style="text-align: center;">Cadastro</h4><hr>
            <form action="{{ route('realizarCadastro') }}" method="POST">
                @csrf
                <div class="row mb-1">
                    <div class="col">
                        <label for="nome" style="color: #fff;">Nome:</label>
                        <input type="text" placeholder="Nome" id="nome" class="form-control" name="nome" value="{{ old('nome') }}" maxlength="100" required autofocus>
                        @if ($errors->has('nome'))
                        <span class="text-danger">{{ $errors->first('nome') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="sobrenome" style="color: #fff;">Sobrenome:</label>
                        <input type="text" placeholder="Sobrenome" id="sobrenome" class="form-control" name="sobrenome" value="{{ old('sobrenome') }}" maxlength="100" required autofocus>
                        @if ($errors->has('sobrenome'))
                        <span class="text-danger">{{ $errors->first('sobrenome') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="data_nascimento" style="color: #fff;">Data de nascimento:</label>
                        <input type="text" id="data_nascimento" placeholder="__/__/____"class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" required autofocus>
                        @if ($errors->has('data_nascimento'))
                        <span class="text-danger">{{ $errors->first('data_nascimento') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="status" style="color: #fff;">Você é:</label>
                        <select class="form-control" id="status" name="status" value="{{ old('status') }}" required>
                            <option></option>
                            <option value="" disabled selected>Aluno, professor, técnico administrativo ou externo</option>
                            <option>Aluno</option>
                            <option>Professor</option>
                            <option>Técnico administrativo</option>
                            <option>Externo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-1">
                    <label for="email" style="color: #fff;">E-mail:</label>
                    <input type="text" placeholder="E-mail" id="email" class="form-control"name="email" value="{{ old('email') }}" maxlength="100" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="password" style="color: #fff;">Senha:</label>
                    <input type="password" placeholder="Senha" id="password" class="form-control" name="password" maxlength="20" required>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="peso" style="color: #fff;">Peso(Kg):</label>
                        <input type="text" placeholder="Peso" id="peso" class="form-control" name="peso" pattern="[\d]+" value="{{ old('peso') }}" required>
                        @if ($errors->has('peso'))
                        <span class="text-danger">{{ $errors->first('peso') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="altura" style="color: #fff;">Altura(m):</label>
                        <input type="number" placeholder="Altura" id="altura" class="form-control" name="altura" step=".01" value="{{ old('altura') }}" required>
                        @if ($errors->has('altura'))
                        <span class="text-danger">{{ $errors->first('altura') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col mb-4">
                        <label for="unidade_bandejao" style="color: #fff; text-align: center;">Em qual campus você utiliza o restaurante universitário com maior frequência?</label>
                        <select class="form-control fake-placeholder" id="unidade_bandejao" onclick="fake_placeholder()" name="unidade_bandejao" value="{{ old('unidade_bandejao') }}" required>
                            <option class="campo-placeholder">Gragoatá, Praia Vermelha, Reitoria, Veterinária ou HUAP.</option>
                            <option>Gragoatá</option>
                            <option>Praia Vermelha</option>
                            <option>Reitoria</option>
                            <option>Veterinária</option>
                            <option>HUAP</option>
                        </select>
                    </div>
                <div class="d-grid mx-auto mb-2">
                    <button type="submit" class="btn btn-success btn-block">Enviar</button>
                </div>
                <a class="nav-link mb-2" href="{{ route('login') }}" style="text-align: center;">Já possuo uma conta cadastrada</a>
            </form>    
        </div>
       
    </body>

    <script>
    $(document).ready(function(){
        $('#data_nascimento').mask('00/00/0000');
    });

    function fake_placeholder(){
        var element = document.getElementById("unidade_bandejao");
        element.classList.remove("fake-placeholder");
    }
    </script>
</html>