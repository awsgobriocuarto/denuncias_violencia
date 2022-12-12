<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Gate;

class PortalsMiddleware
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
        if ( !Gate::Allows('edit-portals') ) {
            return redirect('/home')->withErrors('Su usuario no tiene permisos para realizar esta operación');
        }
        return $next($request);
    }
}
