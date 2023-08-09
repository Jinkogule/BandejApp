
<!--Definição e alteração de cardápio-->
<div class="modal fade" id="visualizar-cardapio{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">
                    Cardápio - {{ $data_visual }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <ul>
                <li>Prato principal: {{ $event->cardapio->prato_principal }}</li>
                <li>Guarnição: {{ $event->cardapio->guarnicao }}</li>
                <li>Acompanhamentos: {{ $event->cardapio->acompanhamentos }}</li>
                <li>Sobremesa: {{ $event->cardapio->sobremesa }}</li>
                <li>Salada 1: {{ $event->cardapio->salada_1 }}</li>
                <li>Salada 2: {{ $event->cardapio->salada_2 }}</li>
                <li>Refresco: {{ $event->cardapio->refresco }}</li>
            </ul>
            </div>
        </div>
    </div>
</div>
