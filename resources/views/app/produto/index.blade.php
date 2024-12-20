@extends('app.layouts.basico')

@section('titulo', 'Super Gestão - Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">

                <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Site Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
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
                            <td>{{$produto->id}}</td>
                            <td> {{$produto->nome}} </td>
                            <td> {{$produto->descricao}} </td>
                            <td> {{$produto->fornecedor->nome}} </td>
                            <td> {{$produto->fornecedor->site}} </td>
                            <td> {{$produto->peso}} </td>
                            <td> {{$produto->unidade_id}} </td>
                            <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                            <td><a href="{{ route ('produto.show', ['produto' =>$produto->id]) }}">Visualizar</a></td>

                            <td>
                                <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Deseja realmente excluir?')">
                                    Excluir
                                    </button>
                                </form>
                            </td>

                            <td><a href="{{route ('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{$produtos->count()}} do total de {{$produtos->total()}} produtos. ({{$produtos->firstItem()}} ao {{$produtos->lastItem()}})
            </div>
        </div>
    </div>
@endsection
