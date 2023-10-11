@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhes')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Adicionar detalhes do produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <!-- <span class="sucesso">{{ $msg ?? ''}}</span> -->
           @component('app.produto.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
           @endcomponent
        </div>

    </div>
@endsection