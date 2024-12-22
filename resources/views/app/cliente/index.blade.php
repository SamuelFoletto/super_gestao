@extends('app.layouts.basico')

@section('titulo', 'Super Gestão - Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('cliente.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td> {{$cliente->nome}} </td>
                            <td><a href="{{ route ('cliente.show', ['cliente' =>$cliente->id]) }}">Visualizar</a></td>

                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}" >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Deseja realmente excluir?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>

                            <td><a href="{{route ('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{$clientes->count()}} do total de {{$clientes->total()}} clientes. ({{$clientes->firstItem()}} ao {{$clientes->lastItem()}})
            </div>
        </div>
    </div>
@endsection
