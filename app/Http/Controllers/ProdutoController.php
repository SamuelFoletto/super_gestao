<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\Item;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe'])->paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }


    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }


    public function store(Request $request)
    {
        $regras=[
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback=[
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no maximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um valor inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }


    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }


    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }


    public function update(Request $request, Produto $produto)
    {
     $produto->update($request->all());
     return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');

    }
}