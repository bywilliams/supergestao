<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivos_contatos = MotivoContato::all();


        return view('site.contato', [ 'titulo' => 'Contato', 'motivos_contatos' => $motivos_contatos]);
    }

    public function salvar(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome deve ter no minímo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'nome.unique' => 'Este nome já esta em uso.',
            'email.email' => 'Este e-mail não é válido.',
            'motivo_contatos_id.required' => 'Escolhe um motivo para contato.',
            // configuração para mensagens genéricas
            'required' => 'O campo :attribute é obrigado.'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }
}
