<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
//notificaciones
use App\Models\Notification as Not, App\Models\User;
use Auth;
use App\Functions\Functions;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        
        //Los providers en Laravel se ejecutan antes que los middlewares y como las
        //sesiones se inicializan en un middleware no es posible acceder directamente.
        //Se podría crear un middleware para ello, sin embargo, temporalmente, realizamos 
        //un callback desde view() que nos permite acceder a la clase Auth de forma estática

        //Comprobación de notificaciones: el '*' indica en todas las vistas
        view()->composer('*',function($view){
            update_notifications();
        });
    }
}
