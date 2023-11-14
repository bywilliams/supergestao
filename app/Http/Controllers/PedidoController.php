<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\Clientes;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pedidos = Pedidos::paginate(10);

        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clientes = Clientes::all();
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'cliente_id' => 'exists:cleients,id'
        ];

        $feedback = [
            'cliente_id.exists' => 'O cliente informado não existe.'
        ];
        $request->validate($regras, $feedback);

        $pedido = new Pedidos();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        $pedidos = Pedidos::paginate(10);
        return redirect()->route('pedido.index', ['pedidos' => $pedidos ]);
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
