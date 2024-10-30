<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;


class ContatoController extends Controller
{
    public function contato(){
        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo'=>'Contato', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){
        $regras = [
            'nome'=>'required|min:3|max:40|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',
            'motivo_contatos_id'=>'required',
            'mensagem'=>'required|max:2000'
        ];
        $feedback = [
            'nome.min' => 'O nome deve conter no minimo 3 caracteres',
            'nome,max' => 'O nome deve conter no maximo 40 caracteres',
            'nome.unique' => 'Já existe um contato com este nome cadastrado!',
            'email' => 'Forneça um e-mail válido!',
            'motivo_contatos_id' => 'Selecione o movivo do seu contato',
            'required' => 'O campo :attribute deve ser preenchido'
        ];
        $request->validate($regras, $feedback);
       SiteContato::create($request->all());
       return redirect()->route('site.index');


    }
}
