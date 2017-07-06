<?php

namespace App\Http\Middleware;

use Closure;

class Participante
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

        foreach (auth()->user()->roles as $role){
            if(isset($role->titulo)){
                return $next($request);
            }
        }

        return redirect('participantes');

    }
}
