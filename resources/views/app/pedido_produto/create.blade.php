@extends('app.layouts.basico')

@section('titulo', 'Super Gestão - Pedido Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Adicionar Produtos ao Pedido</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>

        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{$pedido->id}}</p>
            <p>Cliente: {{$pedido->cliente_id}}</p>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do pedido</h4>
                <table width="100%" border="1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pedido->produtos as $produto)
                    <tr>
                        <th>{{$produto->id}}</th>
                        <th>{{$produto->nome}}</th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
            </div>
        </div>
    </div>
@endsection
