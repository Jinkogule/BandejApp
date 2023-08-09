
<!--Notificação de confirmação-->
<div class="modal fade" id="avaliar-refeicao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Avaliação de Refeição</h5>
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
                    o almoço
                <?php
                }
                if ($event->tipo == 'Janta'){
                ?>
                    a janta
                <?php
                }
                ?>
                  que realizou nesta {{ $dia_da_semana }}, dia {{ $data_visual }}, no campus {{ $event->unidade_bandejao }}.
                <br><br>
            </div>
            <div class="modal-footer">


                <!--Avaliar refeição Form-->
                <form id="avaliar-refeicao" action="{{ route('avaliarRefeicao') }}" method="POST">
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
