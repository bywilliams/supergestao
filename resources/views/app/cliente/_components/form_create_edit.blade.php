@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif
        <input type="text" name="name" placeholder="Nome:" value="{{ $cliente->nome ?? old('nome') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('name') ? $errors->first('name') : ''  }} </span>
        <button type="submit" class="borda-preta">Salvar </button>
    </form>