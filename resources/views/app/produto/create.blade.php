@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            @if(isset($produto->id))
                <h1>Editar produto</h1>
            @else
                <h1>Adicionar produto</h1>
            @endif
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li> 
                <li><a href="">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <!-- <span class="sucesso">{{ $msg ?? ''}}</span> -->
            @if(isset($produto->id))
                <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
                @csrf
                @method('PUT')
            @else
                <form action="{{ route('produto.store') }}" method="post">
                @csrf
            @endif
                <input type="text" name="nome"  placeholder="Nome:" value="{{ $produto->nome ?? old('nome') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span>
                <input type="text" name="descricao"  placeholder="Descição:" value="{{ $produto->descricao ?? old('descricao') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('descricao') ? $errors->first('descricao') : ''  }} </span>
                <input type="text" name="peso"  placeholder="Peso:" value="{{ $produto->peso ??  old('peso') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('peso') ? $errors->first('peso') : ''  }} </span>
                <select name="unidade_id">
                    <option value=""> -- Selecione a unidade de medida --</option>
                    @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                        {{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                <span class="erros"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''  }} </span>
                <button type="submit" class="borda-preta">Salvar </button>
            </form>
        </div>

    </div>
@endsection