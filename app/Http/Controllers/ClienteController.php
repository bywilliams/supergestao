<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $clientes = Clientes::paginate(10);
        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'name' => 'required|min:3|max:40'
        ];

        $feedback = [
            'name.required' => 'O campo :attribute é obrigatório.',
            'name.min' => 'O campo nome deve ter no minimo 3 caracteres.',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres.' 
        ];

        $request->validate($regras, $feedback);

        $cliente = new Clientes();
        $cliente->name = $request->input('name');
        $cliente->save();

        return redirect()->route('cliente.index');
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
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
