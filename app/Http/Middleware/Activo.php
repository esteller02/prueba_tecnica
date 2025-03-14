<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Activo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $activo = $request->user()->activo;

        //SI EL USUARIO ESTA INACTIVO SE REDIRECCIONARÁ AL HOME
        if(!$activo)
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
