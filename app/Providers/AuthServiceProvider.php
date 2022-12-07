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

        # Permisos de acceso a edicion de usuarios según rol usuario
        Gate::define('edit-users', function ($user) {

            #  true si se trate un usuario administrador
            return $user->isAdmin();

        });
        # END Permisos de acceso a edicion de usuarios
    }
}
