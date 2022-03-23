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
                            /*pendente*/
                            if ($event->status_confirmacao == 'N'){
                            ?>
                                <img src="/images/pendente.png" class="img-fluid" alt="Responsive image" data-toggle="modal" data-target="#confirmacao-notificacao{{$event->id}}" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                            <?php
                            }
                            /*confirmada*/
                            else{
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
                            /*pendente*/
                            if ($event->status_confirmacao == 'N'){
                            ?>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                    
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-confirmar" data-toggle="modal" data-target="#confirmacao{{$event->id}}" role="button">Confirmar</a>
                                     
                                    </div>
                                    
                                    <!--Form cancelamento de refeição-->
                                    <form id="cancelar_refeicao" action="{{ route('cancelarRefeicao') }}" method="POST">
                                        @csrf          
                                        <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">
    
                                        <div class="col" style="margin: 0 auto;">
                                            <button type="submit" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar">Cancelar</a>
                                        </div>
                                    </form> 
                                    
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>                       
                    </div>




                    <!--Modals de Confirmação-->
                    <div class="modal fade" id="confirmacao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content confirmacao-bloco">
                                <div class="modal-header" style="position: relative">
                                    <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Prezado(a) {{ session('nome') }}, você pretende manter o RU selecionado? ({{$event->unidade_bandejao}} ) id: {{$event->id}}
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style= "margin: 0 auto;">
                                        <div class="col-6">
                                            <!--Confirmar refeição mantendo o RU-->
                                            <form id="confirmar_refeicao" action="{{ route('confirmarRefeicao') }}" method="POST">
                                                @csrf          
                                                <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">
                                                <input type="hidden" id="unidade_bandejao" name="unidade_bandejao" value="{{$event->unidade_bandejao}}">

                                                <div class="col" style="margin: 0 auto;">
                                                    <button type="submit" class="btn btn-primary btn-confirmar">Sim</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-primary btn-neutro" data-dismiss="modal" data-toggle="modal" data-target="#confirmacao-ru{{$event->id}}">Não, irei em outro RU</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Notificação de confirmação-->
                    <div class="modal fade" id="confirmacao-notificacao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content confirmacao-bloco">
                                <div class="modal-header" style="position: relative">
                                    <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Prezado(a) {{ session('nome') }}, você tem um almoço planejado no {{$event->unidade_bandejao}} para amanhã, dia {{$event->data_visual}}.
                                    <br><br>
                                    Você confirma sua presença?
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style= "margin: 0 auto;">
                                        <div class="col-3">
                                            <!--Confirmar refeição mantendo o RU-->
                                            <form id="confirmar_refeicao" action="{{ route('confirmarRefeicao') }}" method="POST">
                                                @csrf          
                                                <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">
                                                <input type="hidden" id="unidade_bandejao" name="unidade_bandejao" value="{{$event->unidade_bandejao}}">

                                                <div class="col" style="margin: 0 auto;">
                                                    <button type="submit" class="btn btn-primary btn-confirmar">Sim</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <!--Confirmar refeição trocando o RU-->
                                            <button type="button" class="btn btn-primary btn-neutro" data-dismiss="modal" data-toggle="modal" data-target="#confirmacao-ru{{$event->id}}">Sim, mas em outro RU</button>
                                        </div>
                                        <div class="col-3">
                                            <!--Form cancelamento de refeição-->
                                            <form id="cancelar_refeicao" action="{{ route('cancelarRefeicao') }}" method="POST">
                                                @csrf          
                                                <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">

                                                <div class="col" style="margin: 0 auto;">
                                                <button type="submit" class="btn btn-primary btn-cancelar">Não</button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Confirmação de RU-->
                    <div class="modal fade" id="confirmacao-ru{{$event->id}}" data-keyboard="false" data-backdrop="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content confirmacao-bloco">
                                <div class="modal-header" style="position: relative">
                                    <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença id: {{$event->id}}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                    <!--Form - Confirmar refeição trocando o RU-->
                                    <form id="confirmar_refeicao" action="{{ route('confirmarRefeicao') }}" method="POST">
                                        @csrf          
                                        <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">
                                        <label for="unidade_bandejao">Selecione o novo local da refeição:</label>
                                        <select class="form-control" id="unidade_bandejao" name="unidade_bandejao">
                                            <option></option>
                                            <option>Gragoatá</option>
                                            <option>Praia Vermelha</option>
                                            <option>Reitoria</option>
                                            <option>Veterinária</option>
                                            <option>HUAP</option>
                                        </select>

                                        <div class="modal-footer">
                                            <div class="row" style= "margin: 0 auto;">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary btn-confirmar">Confirmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach 

                </div>
            </div>          
    </body>
</html>