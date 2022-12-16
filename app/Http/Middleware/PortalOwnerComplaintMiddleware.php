<?php

namespace App\Http\Middleware;

use Closure;

use App\Portal;

class PortalOwnerComplaintMiddleware
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
        
        if ($this->portalOwnerComplaint($request)) {

            return $next($request);

        } else {

            abort(403, 'Acción no autorizada');

        }
    }

    public function portalOwnerComplaint($request)
    {
        
        $user = auth()->user();

        # Determinamos los portales a los que el usuario tiene acceso
        if( ($user->isWebMaster() || $user->isAdmin() )) {

            $array_portals = Portal::pluck('id')->toArray();
            
        } else {

            $array_portals = Portal::where('id', $user->portal_id )->pluck('id')->toArray();
            
        }  
        
        if (!$request->route('complaint.portal_id')) { # Creacion de post
            
            $portal_id = (int)$request->get('portal_id'); # Id de portal que se quiere asignar
            
        } else {
            
            switch ($request->method()) {
                case 'GET': # Edit post
                    $portal_id = (int)$request->route('complaint.portal_id');
                    break;

                case 'PATCH': # Update Post
                    $portal_id = (int)$request->get('portal_id');  # Id de portal que se quiere asignar
                    break;

                case 'POST': # Cargar imagen Post
                    $portal_id = (int)$request->route('complaint.portal_id'); 
                    break;

                case 'DELETE': # Borrar Post o imagen Post
                    $portal_id = (int)$request->route('complaint.portal_id'); 
                    break;
                        
                default:
                    break;
            }
            
        }
          
        if (in_array($portal_id, $array_portals)) {  

            return TRUE;

        } 

        return FALSE; 
    }
}
