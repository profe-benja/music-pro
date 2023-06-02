<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessUsuarioSucursalAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      if (auth('store_usuario')->check()){
        if (auth('store_usuario')->user()->admin) {
          return $next($request);
        }
      }

      return redirect('/')->with('danger','Usuario deshabilitado.');
    }
}
