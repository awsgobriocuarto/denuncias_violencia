<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        # Permisos de acceso a edicion de usuarios según rol usuario (webMaster)
        Gate::define('edit-users', function ($user) {

            #  true si se trate un usuario webmaster
            return $user->isWebMaster();
            
        });
        # END Permisos de acceso a edicion de usuarios
        
        # Permisos de acceso a creacion de Portales
        Gate::define('edit-portals', function ($user) {
            
            return $user->isWebMaster();
            
        });
        # END Permisos de acceso a creacion de Portales
    }
}
