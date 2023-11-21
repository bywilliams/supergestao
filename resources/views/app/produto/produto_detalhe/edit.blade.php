@extends('app.layouts.basico')

@section('titulo', 'Editar Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Editar detalhes produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Voltar</a></li> 
            </ul>
        </div>
        
        <div class="informacao-pagina" style="width: 30%; margin-left: auto; margin-right:auto;">
            <h4>Produto</h2>
            <div>
                Nome: {{ $produto_detalhe->item->nome }}
            </div>
            <br>
            <div>
                Descrição: {{ $produto_detalhe->item->descricao }}
            </div>
            <!-- <span class="sucesso">{{ $msg ?? ''}}</span> -->
            @component('app.produto.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
            @endcomponent
        </div>

    </div>
@endsection