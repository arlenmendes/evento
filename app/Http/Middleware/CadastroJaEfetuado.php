<?php

namespace App\Http\Middleware;

use Closure;

class CadastroJaEfetuado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->participante != null)
            return redirect('/participantes');
        return $next($request);
    }
}
