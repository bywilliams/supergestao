@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Listagem de produtos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li> 
                <li><a href="">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:auto; margin-top: 2rem;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome fornecedor</th>
                            <th>Site fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->fornecedor->site }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->Detalhe->altura ?? ''}}</td>
                            <td> <a href="{{ route('produto.show', ['produto' => $produto->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $produto->id }}" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit();">Excluir</a>
                                </form> 
                            </td>
                            <td> <a href="{{ route('produto.edit', ['produto' => $produto->id ]) }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 1rem;">
                    {{ $produtos->appends($request)->links('app.layouts.custom.pagination') }}
                </div>

                Exibindo {{ $produtos->count() }} Produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }} )
                
            </div>
        </div>

    </div>
@endsection