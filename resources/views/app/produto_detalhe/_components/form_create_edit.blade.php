@if(isset($produto_detalhe->id))
    <form action="{{route('produto-detalhe.update', ['produto_detalhe'=>$produto_detalhe->id])}}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{route('produto-detalhe.store')}}" method="post">
        @csrf
@endif

    <input type="text" name="produto_id" value="{{$produto_detalhe->produto_id ?? old('produto_id')}}" placeholder="ID do Produto" >
    {{ $errors->first('produto_id') ?? '' }}

    <input type="text" name="comprimento" value="{{$produto_detalhe->comprimento ?? old('comprimento')}}" placeholder="Comprimento">
    {{ $errors->first('comprimento') ?? '' }}

    <input type="text" name="largura" value="{{$produto_detalhe->largura ?? old('largura')}}" placeholder="Largura" id="">
    {{ $errors->first('largura') ?? '' }}

    <input type="text" name="altura" value="{{$produto_detalhe->altura ?? old('altura')}}" placeholder="Altura" id="">
    {{ $errors->first('altura') ?? '' }}

    <select name="unidade_id" id="" class="borda-preta">
        <option>-- Selecione a Unidade --</option>

        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{($produto_detalhe->unidade->id ?? old('unidade_id')) == $unidade->id ?? ''}}>{{$unidade->descricao}}</option>
        @endforeach

    </select>
    {{ $errors->first('unidade_id') ?? '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
