<form action="{{ route('pedido-produto-store', ['pedido' => $pedido->id]) }}" method="post">
    @csrf
    <select name="produto_id" title="Selecione um produto">
        <option value=""> -- Selecione um produto -- </option>
        @foreach($produtos as $produto)
        <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
            {{ $produto->nome }}
        </option>
        @endforeach
    </select>
    <span class="erros"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''  }} </span>
    <button type="submit" class="borda-preta">Salvar </button>
</form>