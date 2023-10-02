<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'LIKE', '%'.$request->input('nome').'%')
            ->where('site', 'LIKE', '%'.$request->input('site').'%')
            ->where('uf', 'LIKE', '%'.$request->input('uf').'%')
            ->where('email', 'LIKE', '%'.$request->input('email').'%')
            ->get();

        //dd($fornecedores);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {

        // Status final do cadastro
        $msg = '';
        
        // Checa o token do form
        if ($request->input('_token') != '') {

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

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}