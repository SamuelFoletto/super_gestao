@if(isset($produto->id))
    <form action="{{route('produto.update', ['produto'=>$produto->id])}}" method="post">
        @csrf
        @method('PUT')
        @else
            <form action="{{route('produto.store')}}" method="post">
                @csrf
                @endif
                <input type="text" name="nome" value="{{$produto->nome ?? old('nome')}}" placeholder="Nome" >
                {{ $errors->first('nome') ?? '' }}

                <input type="text" name="descricao" value="{{$produto->descricao ?? old('descricao')}}" placeholder="Descrição">
                {{ $errors->first('descricao') ?? '' }}

                <input type="text" name="peso" value="{{$produto->peso ?? old('peso')}}" placeholder="Peso" id="">
                {{ $errors->first('peso') ?? '' }}

                <select name="unidade_id" id="" class="borda-preta">
                    <option>-- Selecione a Unidade --</option>

                    @foreach($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{($produto->unidade->id ?? old('unidade_id')) == $unidade->id ?? ''}}>{{$unidade->descricao}}</option>
                    @endforeach

                </select>
                {{ $errors->first('unidade_id') ?? '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
