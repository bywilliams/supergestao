@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
    @csrf
    @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif
        <input type="text" name="nome" placeholder="Nome:" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span>
        <input type="text" name="descricao" placeholder="Descição:" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('descricao') ? $errors->first('descricao') : ''  }} </span>
        <input type="text" name="peso" placeholder="Peso:" value="{{ $produto->peso ??  old('peso') }}" class="borda-preta">
        <span class="erros"> {{ $errors->has('peso') ? $errors->first('peso') : ''  }} </span>
        <select name="unidade_id">
            <option value=""> -- Selecione a unidade de medida --</option>
            @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}
            </option>
            @endforeach
        </select>
        <span class="erros"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''  }} </span>
        <button type="submit" class="borda-preta">Salvar </button>
    </form>