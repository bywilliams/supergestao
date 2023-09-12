<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivos_contatos = MotivoContato::all();

        //dd($motivos_contatos);
        
        // usando método all() do Request direto no create
        // $contato = new SiteContato();
        // $contato->create($request->all());

        return view('site.contato', [ 'titulo' => 'Contato', 'motivos_contatos' => $motivos_contatos]);
    }

    public function salvar(Request $request) {

        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
