@if(isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
        @csrf
@endif
        <input type="text" name="produto_id" placeholder="Produto Id:" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : ''  }} </span>
        <input type="text" name="comprimento" placeholder="Comprimento:" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''  }} </span>
        <input type="text" name="largura" placeholder="Largura:" value="{{ $produto_detalhe->largura ?? old('largura') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('largura') ? $errors->first('largura') : ''  }} </span>
        <input type="text" name="altura" placeholder="Altura:" value="{{ $produto_detalhe->altura ??  old('altura') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('altura') ? $errors->first('altura') : ''  }} </span>
        <select name="unidade_id">
            <option value=""> -- Selecione a unidade de medida --</option>
            @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}
            </option>
            @endforeach
        </select>
        <span class="erros"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''  }} </span>
        <button type="submit" class="borda-preta">Salvar </button>
    </form>