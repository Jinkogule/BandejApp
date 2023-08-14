<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Avaliação de Bandejão</title>

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

        <!--Mensagens-->
        @include('comuns.mensagens')

        <div class="container container-cadastro mb-4">
            <h4 style="text-align: center;">Avaliação de Bandejão</h4>
            <hr>
            <form action="{{ route('avaliarBandejao') }}" method="POST">
                @csrf
                <div class="row mb-2">
                    <div class="col">
                        <label for="atendimento_nota" style="color: #fff;">Atendimento:</label>
                        <input type="text" placeholder="" id="atendimento_nota" name="atendimento_nota" class="form-control"  value="{{ old('atendimento_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('atendimento_nota'))
                        <span class="text-danger">{{ $errors->first('atendimento_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="atendimento_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="atendimento_comentario" name="atendimento_comentario" class="form-control"  value="{{ old('atendimento_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('atendimento_comentario'))
                        <span class="text-danger">{{ $errors->first('atendimento_comentario') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <label for="ambiente_nota" style="color: #fff;">Ambiente:</label>
                        <input type="text" placeholder="" id="ambiente_nota" name="ambiente_nota" class="form-control"  value="{{ old('ambiente_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('ambiente_nota'))
                        <span class="text-danger">{{ $errors->first('ambiente_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="ambiente_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="ambiente_comentario" name="ambiente_comentario" class="form-control"  value="{{ old('ambiente_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('ambiente_comentario'))
                        <span class="text-danger">{{ $errors->first('ambiente_comentario') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <label for="cardapios_nota" style="color: #fff;">Cardápios:</label>
                        <input type="text" placeholder="" id="cardapios_nota" name="cardapios_nota" class="form-control"  value="{{ old('cardapios_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('cardapios_nota'))
                        <span class="text-danger">{{ $errors->first('cardapios_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="cardapios_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="cardapios_comentario" name="cardapios_comentario" class="form-control"  value="{{ old('cardapios_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('cardapios_comentario'))
                        <span class="text-danger">{{ $errors->first('cardapios_comentario') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <label for="fila_nota" style="color: #fff;">Fila:</label>
                        <input type="text" placeholder="" id="fila_nota" name="fila_nota" class="form-control"  value="{{ old('fila_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('fila_nota'))
                        <span class="text-danger">{{ $errors->first('fila_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="fila_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="fila_comentario" name="fila_comentario" class="form-control"  value="{{ old('fila_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('fila_comentario'))
                        <span class="text-danger">{{ $errors->first('fila_comentario') }}</span>
                        @endif
                    </div>
                </div>


                <div class="row mb-2">
                    <div class="col">
                        <label for="comida_nota" style="color: #fff;">Comida:</label>
                        <input type="text" placeholder="" id="comida_nota" name="comida_nota" class="form-control"  value="{{ old('comida_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('comida_nota'))
                        <span class="text-danger">{{ $errors->first('comida_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="comida_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="comida_comentario" name="comida_comentario" class="form-control"  value="{{ old('comida_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('comida_comentario'))
                        <span class="text-danger">{{ $errors->first('comida_comentario') }}</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <label for="outro_topico_nota" style="color: #fff;">Outro:</label>
                        <input type="text" placeholder="" id="outro_topico_nota" name="outro_topico_nota" class="form-control"  value="{{ old('outro_topico_nota') }}" maxlength="100" required autofocus>
                        @if ($errors->has('outro_topico_nota'))
                        <span class="text-danger">{{ $errors->first('outro_topico_nota') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="outro_topico_comentario" style="color: #fff;">Explique o motivo da nota (opcional):</label>
                        <input type="text" placeholder="" id="outro_topico_comentario" name="outro_topico_comentario" class="form-control"  value="{{ old('outro_topico_comentario') }}" maxlength="100" required autofocus>
                        @if ($errors->has('outro_topico_comentario'))
                        <span class="text-danger">{{ $errors->first('outro_topico_comentario') }}</span>
                        @endif
                    </div>
                </div>

                <div class="d-grid mx-auto mb-2">
                    <button type="submit" class="btn btn-success btn-block">Enviar</button>
                </div>

            </form>
        </div>

    </body>
</html>
