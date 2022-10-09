<?php

namespace App\Http\Middleware;

use Closure,Auth,Route;
use Illuminate\Http\Request;
use App\Functions\Permissions as role_permissions;


class Permissions
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
        $this->user = Auth::user();
        $this->permissions = new role_permissions();
        //aunque si se añade el middleware auth antes del middleware admin no debe dar 
        //error, en el caso de no añadirlo antes se genera un error con la llamada 
        //Auth::user(), ya que devueleve null al no haber usuario logueado, para 
        //evitarlo, modificamos el condicional if:
        //if($this->user->role == 1):
    //modificamos el middleware al cambiar el sistema de permisos a roles
        //if($this->user && $this->user->role == 1 && $this->permissions->testPermission($this->user->permissions,Route::currentRouteName()) == true):
        if($this->user && $this->user->role == 1 && $this->permissions->testRole($this->user->role,Route::currentRouteName()) == true 
            || $this->user && $this->user->roles->special == 'all'):
            return $next($request);
        else:
            //enviar un mensaje de: "No tiene acceso a esta zona..."
            return redirect('/');
        endif;
        
    }
}
