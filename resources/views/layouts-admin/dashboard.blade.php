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
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        @include('comuns.scripts')
    </head>

    <body>
        @include('layouts-admin.components-admin.navbar1')

        <br>

        <div class="container-fluid container-cdr">
            <br>
            <h2 style="text-align: center; color: #fff;">Calendário de Refeições</h2>
            <div class="container-fluid container2-cdr" style="overflow: auto">

                @foreach($calendario_dias as $event)

                    <?php




                    /*aux*/
                    $data_banco = $event->data;
                    $data_visual = date("d/m/y", strtotime($data_banco));
                    $dia_da_semana_visual = ucfirst($event->dia_da_semana);
                    ?>

                    @include('layouts-admin.components-admin.modal-salvar-cardapio')


                    <div class="card">
                        <div class="card-header">
                            <span class="card-title" style="text-align: center; color: #fff;">{{ $dia_da_semana_visual }} - {{ $data_visual }}</span>


                        </div>
                        <div class="cardapio-admin">
                                @if (is_null($event->cardapio_id))
                                    <div class="d-grid mx-auto">
                                        <button type="button" data-toggle="modal" class="btn btn-danger btn-block" data-target="#salvar-cardapio{{$event->id}}">
                                            Definir Cardápio
                                        </button>
                                    </div>
                                @else
                                    <!--Modal visualizar cardápio-->
                                    @include('layouts-admin.components-admin.modal-visualizar-cardapio')

                                    Cardápio: {{ $event->cardapio->prato_principal }}...
                                    <img src="/images/icons/visualizar-detalhes.png" class="img-fluid img-visualizar-cardapio" alt="Responsive image" data-toggle="modal" data-target="#visualizar-cardapio{{$event->id}}">
                                    <img src="/images/icons/editar.png" class="img-fluid img-editar-cardapio" alt="Responsive image" data-toggle="modal" data-target="#salvar-cardapio{{$event->id}}">
                                @endif
                            </div>
                        <div class="card-body" style="color: #fff;">
                            @include('layouts-admin.components-admin.modal-visualizar-dados')

                            <i>Confirmados no Gragoatá:</i> {{ $confirmados[$event->id]['confirmados_total_gragoata'] }}
                            <br>
                            <i>Confirmados na Praia Vermelha:</i> {{ $confirmados[$event->id]['confirmados_total_pv'] }}
                            <br>
                            <i>Confirmados na Reitoria:</i> {{ $confirmados[$event->id]['confirmados_total_reitoria'] }}
                            <br>
                            <i>Confirmados na Veterinária:</i> {{ $confirmados[$event->id]['confirmados_total_veterinaria'] }}
                            <br>
                            <i>Confirmados no HUAP:</i> {{ $confirmados[$event->id]['confirmados_total_veterinaria'] }}
                            <hr>
                            <i>Total de confirmados:</i> {{ $confirmados[$event->id]['confirmados_total'] }}
                            <hr>
                            <div class="d-grid mx-auto">
                                <button type="button" data-toggle="modal" class="btn btn-info btn-block" data-target="#visualizar-dados{{$event->id}}">
                                    Ver detalhes
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
