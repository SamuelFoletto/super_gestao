@extends('app.layouts.basico')

@section('titulo', 'Super Gestão - Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedidos - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nº Pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td> {{$pedido->id}} </td>
                            <td>{{$pedido->cliente_id}}</td>
                            <td><a href="{{ route ('pedido.show', ['pedido' =>$pedido->id]) }}">Visualizar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Deseja realmente excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>

                            <td><a href="{{route ('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}
                <br>
                Exibindo {{$pedidos->count()}} do total de {{$pedidos->total()}} clientes. ({{$pedidos->firstItem()}} ao {{$pedidos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
