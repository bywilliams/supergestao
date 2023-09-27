<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodoAutenticacao): Response
    {

        echo $metodoAutenticacao . '<br>';

        if($metodoAutenticacao == 'padrao') {
            echo 'Método de autentição ' . $metodoAutenticacao . '<br>';
        }

        if ($metodoAutenticacao == 'ldap') {
            echo 'Método de autentição ' . $metodoAutenticacao . '<br>';
        }

        // Verifica se o usuário possui acesso a rota
        if(false) {
            return $next($request);
        } else {
            return Response('Acesso negado, área administrativa');
        }

    }
}
