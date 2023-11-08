@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif
        
        <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span>
        <input type="text" name="nome" placeholder="Nome:" value="{{ $cliente->nome ?? old('nome') }}" class="borda-preta">
        <button type="submit" class="borda-preta">Salvar </button>
    </form>