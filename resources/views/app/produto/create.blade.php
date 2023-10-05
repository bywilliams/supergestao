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
            <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                @csrf
               
                <input type="text" name="nome"  placeholder="Nome:" value="" class="borda-preta">
                <!-- <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span> -->
                <input type="text" name="descricao"  placeholder="Descição:" value="" class="borda-preta">
                <!-- <span class="erros"> {{ $errors->has('site') ? $errors->first('site') : ''  }} </span> -->
                <input type="text" name="peso"  placeholder="Peso:" value="" class="borda-preta">
                <!-- <span class="erros"> {{ $errors->has('uf') ? $errors->first('uf') : ''  }} </span> -->
                <select name="unidade_id">
                    <option value=""> -- Selecione a unidade de medida --</option>
                    @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
                    @endforeach
                </select>
                <!-- <span class="erros"> {{ $errors->has('email') ? $errors->first('email') : ''  }} </span> -->
                <button type="submit" class="borda-preta">Salvar </button>
            </form>
        </div>

    </div>
@endsection