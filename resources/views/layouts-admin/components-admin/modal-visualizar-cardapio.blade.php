
<!--Visualização de cardápio-->
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

                <li><i>Prato principal:</i> {{ $event->cardapio->prato_principal }}</li>
                <br>
                <li><i>Guarnição:</i> {{ $event->cardapio->guarnicao }}</li>
                <br>
                <li><i>Acompanhamentos:</i> {{ $event->cardapio->acompanhamentos }}</li>
                <br>
                <li><i>Salada 1:</i> {{ $event->cardapio->salada_1 }}</li>
                <br>
                <li><i>Salada 2:</i> {{ $event->cardapio->salada_2 }}</li>
                <br>
                <li><i>Sobremesa:</i> {{ $event->cardapio->sobremesa }}</li>
                <br>
                <li><i>Refresco:</i> {{ $event->cardapio->refresco }}</li>

            </ul>
            </div>
        </div>
    </div>
</div>
