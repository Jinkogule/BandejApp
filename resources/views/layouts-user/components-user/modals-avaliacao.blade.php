
<!--Notificação de confirmação-->
<div class="modal fade" id="confirmacao-avaliacao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content confirmacao-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Avaliação de Refeição - ({{$event->id}}) - {{$event->tipo}}</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $data_banco = $event->data;
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana = DB::table('calendario')->select('dia_da_semana')->where('data', '=', $data_banco)->value('dia_da_semana');
                ?>
                Prezado(a) {{ session('nome') }} avalie
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


                <!--Confirmar refeição mantendo o RU-->
                <form id="confirmar_avaliacao" action="{{ route('confirmarAvaliacao') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">

                    <label for="avaliacao">Avaliação:</label>
                    <input type="text" id="avaliacao" name="avaliacao" pattern="[0-9]+" required>

                    <label for="avaliacao_detalhada">Detalhes de sua avaliação:</label>
                    <input type="text" id="avaliacao_detalhada" name="avaliacao_detalhada" pattern="^[a-zA-Z\s]+$">

                    <div class="col" style="margin: 0 auto;">
                        <button type="submit" class="btn btn-primary btn-confirmar">Enviar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
