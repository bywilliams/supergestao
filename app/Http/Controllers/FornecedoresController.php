<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index() {
        $fornecedores = [
            // array multidimensional
            0 => [
                "nome" => 'fornecedor 1',
                'status' => 'N',
                'cnpj'=> "000.000.0000/01",
                'ddd' => '85', // Fortaleza
                'telefone' => '8343-1214'
            ],
            1 => [
                "nome" => 'fornecedor 2',
                'status' => 'S',
                'cnpj'=> "230.0450.0560/01",
                'ddd' => '11', // São Paulo
                'telefone' => '1233-1214'
            ],
            2 => [
                "nome" => 'fornecedor 3',
                'status' => 'S',
                'cnpj'=> "599.0450.0560/01",
                'ddd' => '32', // Juiz de fora MG
                'telefone' => '1233-1214'
            ],
        ];

        

        return view('app.fornecedores.index', compact('fornecedores'));
    }
}
