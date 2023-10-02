@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Fornecedor - Adicionar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li> 
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <span class="sucesso">{{ $msg ?? ''}}</span>
            <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                <input type="text" name="nome"  placeholder="Nome:" value="{{ $fornecedor->nome ?? old('nome') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('nome') ? $errors->first('nome') : ''  }} </span>
                <input type="text" name="site"  placeholder="Site:" value="{{ $fornecedor->site ?? old('site') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('site') ? $errors->first('site') : ''  }} </span>
                <input type="text" name="uf"  placeholder="UF:" value="{{ $fornecedor->uf ?? old('uf') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('uf') ? $errors->first('uf') : ''  }} </span>
                <input type="email" name="email"  placeholder="E-mail:" value="{{ $fornecedor->email ?? old('email') }}" class="borda-preta">
                <span class="erros"> {{ $errors->has('email') ? $errors->first('email') : ''  }} </span>
                <button type="submit" class="borda-preta">Salvar </button>
            </form>
        </div>

    </div>
@endsection