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
        @include('comuns.scripts')
    </head>

    <body>
        @include('dashboard-usuario.navbar1')

        @include('dashboard-usuario.navbar2')

        @if(session()->has('message'))
            <div class="alert alert-success" style="text-align: center;">
                {{ session()->get('message') }}
            </div>
        @endif

        <!-- Button trigger modal 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="position: absolute;">
        Notificação de Confirmação
        </button>
        -->

        <br>

        <!--Suas Próximas Refeições-->
        <div class="container-fluid">
            <div class="container container-d">
                
                <br>
                <h2 style="text-align: center; color: #fff;">Suas Próximas Refeições</h2>
                <div class="container container2-d" style="overflow: auto">

                
                    <br>
                    @foreach($events as $event)
                    <div class="card">
                        <div class="card-header">
                            
                            <?php
                            $amanha = date('Y-m-d', strtotime(' +1 day'));

                            /*Alerta caso refeição esteja pendente e passível de confirmação*/
                            if ($event->status_confirmacao == 'N' && $amanha == $event->data){
                            ?>
                                <img src="/images/pendente.png" class="img-fluid" alt="Responsive image" data-toggle="modal" data-target="#confirmacao-notificacao{{$event->id}}" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                                <script type="text/javascript">
                                    $(window).on('load', function() {
                                        $('#confirmacao-notificacao{{$event->id}}').modal('show');
                                    });
                                </script>
                            <?php
                            }
                            /*Sinal de confirmada caso refeição esteja confirmada*/
                            elseif ($event->status_confirmacao == 'C'){
                            ?>
                                <img src="/images/confirmado.png" class="img-fluid" alt="Responsive image" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                            <?php
                            }
                            ?>
                            <span class="card-title" style="text-align: center; color: #fff;">{{$event->dia_da_semana}} - {{$event->data_visual}} - {{$event->tipo}} - {{$event->unidade_bandejao}}</span>
                        </div>
                        
                        <div class="card-body">
                            <?php
                            if (2 == 2){
                            ?>
                                <div class="container capa-cardapio" style="background-image: url('/images/peixe.jpg');">
                                    <div class="cardapio">
                                        Cardápio: {{$event->cardapio}}
                                    </div>
                                </div>
                                <br>
                            <?php
                            }
                            ?>
                            <?php
                            /*Botões de confirmação e cancelamento caso refeição não esteja confirmada*/
                            if ($event->status_confirmacao == 'N'){
                            ?>
                                <div class="container botoes-cc" style="margin: 0 auto;">
                                    <div class="row">
                                        <?php
                                        /*Botão de confirmação disponível caso o dia atual seja 1 anterior à ocorrência da refeição*/
                                        if ($amanha >= $event->data){
                                        ?>
                                            <div class="d-grid mx-auto mb-3">
                                                <button type="submit" class="btn btn-sm btn-confirmar" data-toggle="modal" data-target="#confirmacao{{$event->id}}">Confirmar</button>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <!--Form cancelamento de refeição-->
                                        <form id="cancelar_refeicao" action="{{ route('cancelarRefeicao') }}" method="POST">
                                            @csrf          
                                            <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">                
                                            <div class="d-grid mx-auto mb-2">
                                                <button type="submit" class="btn btn-sm btn-cancelar">Cancelar</button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>                       
                    </div>

                    @include('dashboard-usuario.confirmacao')
                    @endforeach 

                </div>
            </div>          
    </body>
</html>