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
                    <div class="card">
                        <div class="card-header">

                        <img src="/images/confirmado.png" class="img-fluid" alt="Responsive image" style="position: absolute; width: 20px; height: auto; right: 10px; top: 10px;">
                            <span class="card-title" style="text-align: center; color: #fff;">Segunda-feira - 06/10/2021 - Almoço - Gragoatá</span>
                        </div>
                        
                        <div class="card-body">
                            <?php
                            if (2 == 2){
                            ?>
                            <div class="container capa-cardapio" style="background-image: url('/images/peixe.jpg');">
                                <div class="cardapio">
                                    Cardárpio: Peixe
                                </div>
                            </div>
                            <br>
                            <?php
                            }
                            ?>
                        </div>                       
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">Terça-feira - 07/10/2021 - Almoço - Gragoatá</span>
                        </div>
                        
                        <div class="card-body">
                            <br>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-desativado" role="button">Confirmar</a>
                                    </div>
                                    
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar" role="button">Cancelar</a>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">Quarta-feira - 08/10/2021 - Almoço - Gragoatá</span>
                        </div>
                        
                        <div class="card-body">
                            <br>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-desativado" role="button">Confirmar</a>
                                    </div>
                                    
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar" role="button">Cancelar</a>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">Quinta-feira - 09/10/2021 - Almoço - Gragoatá</span>
                        </div>
                        
                        <div class="card-body">
                            <br>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-desativado" role="button">Confirmar</a>
                                    </div>
                                    
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar" role="button">Cancelar</a>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">Sexta-feira - 010/10/2021 - Almoço - Gragoatá</span>
                        </div>
                        
                        <div class="card-body">
                            <br>
                            <div class="container botoes-cc" style="margin: 0 auto;">
                                <div class="row">
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-desativado" role="button">Confirmar</a>
                                    </div>
                                    
                                    <div class="col" style="margin: 0 auto;">
                                        <a href="#" class="btn btn-primary btn-sm d-flex justify-content-center btn-cancelar" role="button">Cancelar</a>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>
                </div>
            </div>          
    </body>
</html>