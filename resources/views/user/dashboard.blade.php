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

        @include('dashboard-usuario.confirmacao')
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
                            /*pendente*/
                            if ($event->status_confirmacao == 'N'){
                            ?>
                                <img src="/images/pendente.png" class="img-fluid" alt="Responsive image" data-toggle="modal" data-target="#confirmacao-notificacao" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                            <?php
                            }
                            /*confirmada*/
                            else{
                            ?>
                                <img src="/images/confirmado.png" class="img-fluid" alt="Responsive image" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                            <?php
                            }
                            
                            ?>
                            <span class="card-title" style="text-align: center; color: #fff;">{{$event->dia_da_semana}} - data - {{$event->tipo}} - {{$event->unidade_bandejao}}</span>
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
                            /*pendente*/
                            if ($event->status_confirmacao == 'N'){
                            ?>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-confirmar" data-toggle="modal" data-target="#confirmacao" role="button">Confirmar</a>
                                     
                                    </div>
                                    
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar" role="button">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>                       
                    </div>
                    @endforeach 

                </div>
            </div>          
    </body>
</html>