@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Listagem de Pedidos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li> 
                <li><a href="">Consulta</a></li> 
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right:auto; margin-top: 2rem;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Id pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->cliente_id }}</td>
                            <td><a href="{{ route('pedido-produto-create', ['pedido' => $pedido->id]) }}">Cadastrar produtos</a></td>
                            <td> <a href="{{ route('pedido.show', ['pedido' => $pedido->id ]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{ $pedido->id }}" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit();">Excluir</a>
                                </form> 
                            </td>
                            <td> <a href="{{ route('pedido.edit', ['pedido' => $pedido->id ]) }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 1rem;">
                    {{ $pedidos->appends($request)->links('app.layouts.custom.pagination') }}
                </div>

                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }} )
                
            </div>
        </div>

    </div>
@endsection