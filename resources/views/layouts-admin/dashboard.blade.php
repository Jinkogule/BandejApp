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

                            <div class="table-responsive" style="color: #fff;">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gragoatá</th>
                        <th scope="col">Praia Vermelha</th>
                        <th scope="col">Reitoria</th>
                        <th scope="col">Veterinária</th>
                        <th scope="col">HUAP</th>
                        <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Registrados almoço</th>
                            <td>{{ $registrados[$event->id]['registrados_almoco_gragoata'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_almoco_pv'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_almoco_reitoria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_almoco_veterinaria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_almoco_huap'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Registrados janta</th>
                            <td>{{ $registrados[$event->id]['registrados_janta_gragoata'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_janta_pv'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_janta_reitoria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_janta_veterinaria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_janta_huap'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total registrados</th>
                            <td>{{ $registrados[$event->id]['registrados_total_gragoata'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_total_pv'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_total_reitoria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_total_veterinaria'] }}</td>
                            <td>{{ $registrados[$event->id]['registrados_total_huap'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Confirmados almoço</th>
                            <td>{{ $confirmados[$event->id]['confirmados_almoco_gragoata'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_almoco_pv'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_almoco_reitoria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_almoco_veterinaria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_almoco_huap'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Confirmados janta</th>
                            <td>{{ $confirmados[$event->id]['confirmados_janta_gragoata'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_janta_pv'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_janta_reitoria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_janta_veterinaria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_janta_huap'] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Total confirmados</th>
                            <td>{{ $confirmados[$event->id]['confirmados_total_gragoata'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_total_pv'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_total_reitoria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_total_veterinaria'] }}</td>
                            <td>{{ $confirmados[$event->id]['confirmados_total_huap'] }}</td>

                            <td>{{ $confirmados[$event->id]['confirmados_total'] }}</td>
                        </tr>
                    </tbody>
                    </table>
</div>
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
