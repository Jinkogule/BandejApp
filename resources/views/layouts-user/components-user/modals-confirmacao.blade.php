<!--Modals de Confirmação-->
<div class="modal fade" id="confirmacao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Prezado(a) {{ session('nome') }}, você pretende manter o RU selecionado? ({{$event->unidade_bandejao}})
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
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $data_banco = $event->data;
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana = DB::table('calendario')->select('dia_da_semana')->where('data', '=', $data_banco)->value('dia_da_semana');
                ?>
                Prezado(a) {{ session('nome') }}, você tem
                <?php
                if ($event->tipo == 'Almoço'){
                ?>
                    um almoço planejado
                <?php
                }
                if ($event->tipo == 'Janta'){
                ?>
                    uma janta planejada
                <?php
                }
                ?>
                  no campus {{ $event->unidade_bandejao }} para {{ $dia_da_semana }}, dia {{ $data_visual }}.
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
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!--Form - Confirmar refeição trocando o RU-->
                <form id="confirmar_refeicao" action="{{ route('confirmarRefeicao') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">
                    <label for="unidade_bandejao">Selecione o novo local da refeição:</label>
                    <select class="form-control" id="unidade_bandejao" name="unidade_bandejao" required>
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
