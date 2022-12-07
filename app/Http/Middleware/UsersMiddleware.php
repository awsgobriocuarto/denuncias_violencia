<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Gate;

class UsersMiddleware
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
        if ( !Gate::Allows('edit-users') ) {
            return redirect('/home')->withErrors('El usuario no tiene permisos para realizar esta operación');
        }

        return $next($request);
    }
}
