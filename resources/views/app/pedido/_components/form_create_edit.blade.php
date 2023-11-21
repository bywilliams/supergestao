@if(isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
        @csrf
@endif
        <select name="cliente_id" title="Selecione um cliente">
            <option value=""> -- Selecione um cliente --</option>
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('fornecedor_id')) == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->name }}
            </option>
            @endforeach
        </select>
        <span class="erros"> {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : ''  }} </span>
        <button type="submit" class="borda-preta">Salvar </button>
    </form>