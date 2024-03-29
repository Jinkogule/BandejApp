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
        @include('layouts-user.components-user.navbar1')

        <!--@include('layouts-user.components-user.navbar2')-->

        <!--Mensagens-->
        @include('comuns.mensagens')

        <br>
        <!--Suas Próximas Refeições-->

        <div class="container container-d">
            <br>
            <h2 style="text-align: center; color: #fff;">Suas Próximas Refeições</h2>
            <div class="container container2-d" style="overflow: auto">
            <br>
            <?php
            if ($verif_null == 1){
            ?>

            <!--temporário-->
            @foreach($events2 as $event)
                <?php
                if ($event->status_confirmacao == 'P' /*&& $amanha == $event->data*/){
                ?>
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#confirmacao-notificacao{{$event->id}}').modal('show');
                    });
                </script>
                <?php
                }
                ?>
                @include('layouts-user.components-user.modals-confirmacao')
            @endforeach
            <!--temporário-->

            <!--teste modal avaliação-->
            @foreach($events2 as $event)
                <?php
                if ($event->status_confirmacao == 'C' && $event->avaliacao == null/*&& $amanha == $event->data*/){
                ?>
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#avaliar-refeicao{{$event->id}}').modal('show');
                    });
                </script>
                <?php
                }
                ?>
                @include('layouts-user.components-user.modals-avaliacao')
            @endforeach
            <!--teste modal avaliação-->

            @foreach($events as $event)
            <div class="card">
                <div class="card-header">
                    <?php
                    $amanha = date('Y-m-d', strtotime(' +1 day'));

                    $data_banco = $event->data;
                    $data_visual = date("d/m/y", strtotime($data_banco));
                    $dia_da_semana_visual = ucfirst($event->dia_da_semana);
                    $tipo_visual = ucfirst($event->tipo);

                    /*Alerta caso refeição esteja pendente e passível de confirmação*/

                    if ($event->status_confirmacao == 'P'){
                    ?>
                        <img src="/images/pendente.png" class="img-fluid" alt="Responsive image" data-toggle="modal" data-target="#confirmacao-notificacao{{$event->id}}" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">

                        <!--desativado temporariamente*/ (ativado no temporário acima)
                        <script type="text/javascript">
                            $(window).on('load', function() {
                                $('#confirmacao-notificacao{{$event->id}}').modal('show');
                            });
                        </script>
                        -->

                    <?php
                    }

                    /*Sinal de confirmada caso refeição esteja confirmada*/
                    elseif ($event->status_confirmacao == 'C'){
                    ?>
                        <img src="/images/confirmado.png" class="img-fluid" alt="Responsive image" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                    <?php

                    }

                    ?>
                    <span class="card-title" style="text-align: center; color: #fff;">{{$dia_da_semana_visual}} - {{$data_visual}} - {{$tipo_visual}} - {{$event->unidade_bandejao}}</span>
                </div>

                <div class="card-body">

                    <div class="container capa-cardapio border" style="background-image: url('/images/restaurant.png'); background-size:">
                        <div class="cardapio">
                            @if ($event->cardapio)
                                <ul>
                                    <li><i>Prato principal:</i> {{ $event->cardapio->prato_principal }}</li>
                                    <br><br>
                                    <li><i>Guarnição:</i> {{ $event->cardapio->guarnicao }}</li>
                                    <br><br>
                                    <li><i>Acompanhamentos:</i> {{ $event->cardapio->acompanhamentos }}</li>
                                    <br><br>
                                    <li><i>Salada 1:</i> {{ $event->cardapio->salada_1 }}</li>
                                    <br><br>
                                    <li><i>Salada 2:</i> {{ $event->cardapio->salada_2 }}</li>
                                    <br><br>
                                    <li><i>Sobremesa:</i> {{ $event->cardapio->sobremesa }}</li>
                                    <br><br>
                                    <li><i>Refresco:</i> {{ $event->cardapio->refresco }}</li>
                                </ul>

                            @else
                                <p>Nenhum cardápio definido ainda.</p>
                            @endif
                        </div>
                    </div>
                    <br>
                    <?php

                    /*Botões de confirmação e cancelamento caso refeição não esteja confirmada*/
                    if ($event->status_confirmacao != 'C'){
                    ?>
                        <div class="container botoes-cc" style="margin: 0 auto;">
                            <div class="row">
                                <?php
                                /*Botão de confirmação disponível caso refeição esteja desponível a ser confirmada (pendente)*/
                                if ($event->status_confirmacao == 'P'){
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

            @include('layouts-user.components-user.modals-confirmacao')
            @endforeach
            <?php
            }
            else{
            ?>
            <div class="alert alert-info" style="text-align: center;">
                Sua lista está vazia. Vá em <a href="/planejamentomensal">Planejamento Mensal</a> e selecione as refeições que você pretende realizar no bandejão ao longo dos próximos dias.
            </div>
            <?php
            }
            ?>
        </div>
        @foreach ($unreadNotifications as $notification)
            <img src="/images/icons/notificacao.png" class="notification" title="Você possui notificações não lidas!" onclick="window.location.href='https://bandejapp.herokuapp.com/user/avisos'">
        @endforeach

    </body>
</html>
