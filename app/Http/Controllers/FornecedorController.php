<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    public function index(){
                return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(2);


    return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
            // validando dados
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'nome.min' => 'O campo :attribute deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo :attribute deve ter no máximo 40 caracteres',
                'uf.min' => 'O :attribute deve ter no minimo 2 caracteres',
                'uf.max' => 'O :attribute deve ter no minimo 2 caracteres',
                'email.email' => 'O campo :attribute deve ser preenchido corretamente',
                'required' => 'O campo :attribute deve ser preenchido',

            ];

            $request->validate($regras, $feedback);
            Fornecedor::create($request->all());

            $msg = 'Cadastro realizado com sucesso';
        }

        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Edição realizada com sucesso';

            } else{
                $msg ='Houve alguma falha na edição';
            }

            return redirect()->route('app.fornecedor.editar', ['id'=> $request->input('id'), 'msg' => $msg]);

        }
            return view('app.fornecedor.adicionar', ['msg' => $msg]);



    }

    public function editar($id, $msg =''){

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar', ['msg' => $msg]);
    }

}
