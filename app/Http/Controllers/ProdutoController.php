<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Item;
use App\Models\Fornecedor;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $produtos = Item::with('itemDetalhe', 'fornecedor')->paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Unidades de medida para form
        $unidades = Unidade::all();

        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação de campos
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ] ;

        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'O campo nome deve no minímo 3 caracteres',
            'nome.max' => 'O campo nome deve no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve no minímo 100 caracteres',
            'descricao.max' => 'O campo descrição deve no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve conter um número inteiro',
            'unidade.exists' => 'Selecione uma unidade de medida válida',
            'fornecedor_id.exists' => 'Fornecedor selecionado inválido'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());

        return redirect()->route('produto.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();

        $fornecedores = Fornecedor::all();
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     * @param App\models\Item $produto
     * @param Illuminate\Http\Response;
     */
    public function update(Request $request, Item $produto)
    {
         // Validação de campos
         $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ] ;

        $feedback = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'O campo nome deve no minímo 3 caracteres',
            'nome.max' => 'O campo nome deve no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve no minímo 100 caracteres',
            'descricao.max' => 'O campo descrição deve no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve conter um número inteiro',
            'unidade.exists' => 'Selecione uma unidade de medida válida',
            'fornecedor_id.exists' => 'Fornecedor selecionado inválido'
        ];

        $request->validate($regras, $feedback);
        //dd($request->all());
        // Update total usando PUT no form
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        // Deletar usando verbo HTTP Delete
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
