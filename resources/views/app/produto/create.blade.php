@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Adicionar produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li> 
                <li><a href="">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <!-- <span class="sucesso">{{ $msg ?? ''}}</span> -->
           @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
           @endcomponent
        </div>

    </div>
@endsection