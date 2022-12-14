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

            abort(403, 'Acción no autorizada');
            
        }

        return $next($request);
    }
}
