<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário não encontrado';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Precisa estar logado para acessar essa página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function salvar(Request $request) {

        // validação de regras do formulário
        $regras = [
            'usuario' => 'email',
            'senha' => 'required|min:4|max:12'
        ];

        $feedback = [
            'usuario.email' => 'O campo e-mail é obrigatório!',
            'senha.required' => 'O campo senha é obrigatório!',
            'senha.min' => 'O campo senha deve ter ao menos 4 caracteres',
            'senha.max' => 'O campo senha deve ter no máximo 12 caracteres'
        ];

        $request->validate($regras, $feedback);

        // recuper os parâmetros do formulário
        $email = $request->get('usuario');
        $senha = $request->get('senha');
        
        // Iniciar  o Model User
        $user = new User();
        $usuario = $user->where('email', $email)
                    ->where('password', $senha)
                    ->get()
                    ->first();

        // Checa se o usuário existe
        if(isset($usuario->name)) {
            
            session_start();
            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
