@if (session('successo'))
    <div class="alert alert-success msg-sucesso">
        {{ session('successo') }}
    </div>
@endif

@if (session('erro'))
    <div class="alert alert-danger msg-erro">
        {{ session('erro') }}
    </div>
@endif