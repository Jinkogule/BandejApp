
<!--Definição e alteração de cardápio-->
<div class="modal fade" id="visualizar-dados{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog-centered" role="document">
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">
                    Registrados e Confirmados - {{ $data_visual }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <ul>
            <div class="table-responsive">
                <table class="table" style="color: #fff;">
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

            </ul>
            </div>
        </div>
    </div>
</div>
