<?php

namespace App\Http\Controllers;

use App\Models\ItemDetalhe;
use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ProdutoDetalhe::create($request->all());
        echo "Detalhes do produto salvos com sucesso!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Integer $id
     * return \Illuminate\http\Response
     */
    public function edit($id)
    {
        //
        $produto_detalhe = ItemDetalhe::with('item')->find($id);
        $unidades = Unidade::all();
        return view('app.produto.produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        echo "Atualização efetuada com sucesso";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
