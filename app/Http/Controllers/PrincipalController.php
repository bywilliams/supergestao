<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public  function principal() {

        $motivos_contatos = $motivos_contatos = MotivoContato::all();;

        return view('site.principal', ['titulo' => 'Home Principal', 'motivos_contatos' => $motivos_contatos]);
    }
}
