
<!--Notificação de confirmação-->
<div class="modal fade" id="avaliar-refeicao{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Avaliação de Refeição - {{ $data_visual }}</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $data_banco = $event->data;
                $data_visual = date("d/m/y", strtotime($data_banco));
                $dia_da_semana = DB::table('calendario')->select('dia_da_semana')->where('data', '=', $data_banco)->value('dia_da_semana');
                ?>
                Prezado(a) avalie as refeições que realizou nesta {{ $dia_da_semana }}.
            </div>
            <div class="modal-footer">
                <!--Avaliar refeição Form-->
                <form id="avaliar-refeicao" action="{{ route('avaliarRefeicao') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id_refeicao" name="id_refeicao" value="{{$event->id}}">

                    <div style="display: flex; align-items: center;">
                        <label for="avaliacao">Avaliação:</label>
                        <div class="rate">
                            <input type="radio" id="star5" name="avaliacao" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="avaliacao" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="avaliacao" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="avaliacao" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="avaliacao" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="avaliacao_detalhada">Explique o motivo da nota (opcional):</label>
                        <input type="text" class="form-control" id="avaliacao_detalhada" name="avaliacao_detalhada" pattern="^[a-zA-Z\s]+$">
                    </div>
                    <div class="d-grid mx-auto mb-2">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </form>
                <hr>
                <a class="nav-link mt-2" href="{{ route('user.avaliacao_de_bandejao') }}" style="text-align: center;">Avalie com mais detalhes o Bandejão</a>
            </div>
        </div>
    </div>
</div>
