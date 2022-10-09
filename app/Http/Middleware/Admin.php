<?php

namespace App\Http\Middleware;

use Closure,Auth;

use Illuminate\Http\Request;

class Admin
{
    public $user;
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
        //aunque si se añade el middleware auth antes del middleware admin no debe dar 
        //error, en el caso de no añadirlo antes se genera un error con la llamada 
        //Auth::user(), ya que devueleve null al no haber usuario logueado, para 
        //evitarlo, modificamos el condicional if:
        //if($this->user->role == 1):
        if($this->user && $this->user->role == 1 || $this->user && $this->user->roles->special=='all'):
            return $next($request);
        else:
            return redirect('/');
        endif;
        
    }
}
