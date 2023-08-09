
<!--Definição de cardápio-->
<div class="modal fade" id="definir-cardapio{{$event->id}}" data-keyboard="false" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content confirmacao-bloco">
            <div class="modal-header" style="position: relative">
                <h5 class="modal-title centraliza" id="exampleModalLongTitle">Definir cardápio - {{$event->data}}</h5>
                <button type="button" class="btn-close btn-close-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('definirCardapio') }}">
                    @csrf
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" required>
                    <br>
                    <label for="prato_principal">Prato Principal:</label>
                    <input type="text" name="prato_principal" id="prato_principal" required>
                    <br>
                    <label for="guarnicao">Guarnição:</label>
                    <input type="text" name="guarnicao" id="guarnicao" required>
                    <br>
                    <label for="acompanhamentos">Acompanhamentos:</label>
                    <input type="text" name="acompanhamentos" id="acompanhamentos">
                    <br>
                    <label for="sobremesa">Sobremesa:</label>
                    <input type="text" name="sobremesa" id="sobremesa">
                    <br>
                    <label for="salada_1">Salada 1:</label>
                    <input type="text" name="salada_1" id="salada_1">
                    <br>
                    <label for="salada_2">Salada 2:</label>
                    <input type="text" name="salada_2" id="salada_2">
                    <br>
                    <label for="refresco">Refresco:</label>
                    <input type="text" name="refresco" id="refresco">
                    <br>
                    <div class="col" style="margin: 0 auto;">
                        <button type="submit" class="btn btn-primary btn-confirmar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
