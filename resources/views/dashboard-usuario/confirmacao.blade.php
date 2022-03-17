<!--Confirmação-->
<div class="modal fade" id="confirmacao" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content confirmacao-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Prezado(a), você pretende manter o RU selecionado? (Gragoatá)
            </div>
            <div class="modal-footer">
                <div class="row" style= "margin: 0 auto;">
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-confirmar" data-dismiss="modal">Sim</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-neutro" data-dismiss="modal" data-toggle="modal" data-target="#confirmacao-ru">Não, irei em outro RU</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Notificação de confirmação-->
<div class="modal fade" id="confirmacao-notificacao" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content confirmacao-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Prezado(a), você tem um almoço planejado no Gragoatá para amanhã, dia 15.
                <br><br>
                Você confirma?
            </div>
            <div class="modal-footer">
                <div class="row" style= "margin: 0 auto;">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary btn-confirmar" data-dismiss="modal">Sim</button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-primary btn-neutro" data-dismiss="modal" data-toggle="modal" data-target="#confirmacao-ru">Sim, mas em outro RU</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary btn-cancelar" data-dismiss="modal">Não</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Confirmação de RU-->
<div class="modal fade" id="confirmacao-ru" data-keyboard="false" data-backdrop="false" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content confirmacao-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Confirmação de Presença</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label for="unidade_bandejao">Selecione o novo local da refeição:</label>
                    <select class="form-control" id="unidade_bandejao" name="unidade_bandejao">
                        <option></option>
                        <option>Gragoatá</option>
                        <option>Praia Vermelha</option>
                        <option>Reitoria</option>
                        <option>Veterinária</option>
                        <option>HUAP</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row" style= "margin: 0 auto;">
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-confirmar" data-dismiss="modal">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>