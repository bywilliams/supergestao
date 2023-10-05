@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Adicionar produtos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li> 
                <li><a href="">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <!-- <span class="sucesso">{{ $msg ?? ''}}</span> -->
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
                <input type="text" name="nome"  placeholder="Nome:" value="{{ old('nome') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span>
                <input type="text" name="descricao"  placeholder="Descição:" value="{{ old('descricao') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('descricao') ? $errors->first('descricao') : ''  }} </span>
                <input type="text" name="peso"  placeholder="Peso:" value="{{ old('peso') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('peso') ? $errors->first('peso') : ''  }} </span>
                <select name="unidade_id">
                    <option value=""> -- Selecione a unidade de medida --</option>
                    @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}" {{ old('unidade_id') }}>{{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                <span class="erros"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : ''  }} </span>
                <button type="submit" class="borda-preta">Salvar </button>
            </form>
        </div>

    </div>
@endsection