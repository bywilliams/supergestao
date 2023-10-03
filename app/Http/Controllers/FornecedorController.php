<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(Request $request) {
        $msg = '';
        if ($request->get('msg')) {
            $msg = $request->get('msg');
        }
        return view('app.fornecedor.index', ['msg' => $msg]);
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'LIKE', '%'.$request->input('nome').'%')
            ->where('site', 'LIKE', '%'.$request->input('site').'%')
            ->where('uf', 'LIKE', '%'.$request->input('uf').'%')
            ->where('email', 'LIKE', '%'.$request->input('email').'%')
            ->paginate(3);

        //dd($fornecedores);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {

        // Status final do cadastro
        $msg = '';
        
        // Inclusão
        if ($request->input('_token') != '' && $request->input('id') == '') {

            // validação de campos
            $regras = [
                'nome' => 'required|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.max' => 'O campo nome permite no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve conter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF permite somente até 2 caracteres',
                'email.email' => 'E-mail informado está invalido'
            ];

            $request->validate($regras, $feedback);
           
            // Salva no BD
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "Fornecedor cadastrado com sucesso!";

        }

        // Edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = "Update realizado com sucesso";
            } else {
                $msg = "Erro ao realizar update";
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);

        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {

        $fornecedor = Fornecedor::find($id);

        //dd($fornecedor);


        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function deletar($id, $msg = '') {

        Fornecedor::find($id)->delete();
        $msg = 'Fornecedor excluído com sucesso';

        return redirect()->route('app.fornecedor', ['msg' => $msg]);
    }
}
