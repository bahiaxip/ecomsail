<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator, Auth, Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function loginIn(Request $request){
        $rules = [
            'email' => 'required|email',
            'pass' => 'required|min:8',            
        ];
        $messages = [            
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico no es un correo válido',            
            'pass.required' => 'La contraseña es requerida',
            'pass.min' => 'La contraseña debe tener un mínimo de 8 caracteres',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with(['message'=>'Se originó un error','typealert' => 'danger']);
        else:
            if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('pass')],true)):
                if(Auth::user()->status == "100"):
                    return redirect('/logout');
                else:
                    return redirect('/');
                endif;
            else:
                return back()->withErrors($validator)->with(['message'=>'Correo o contraseña inválida','typealert' => 'danger']);
            endif;
        endif;
    }

    public function register(){
        return view('login.register');
    }

    public function registerAdd(Request $request){
        $rules = [
            'nick' => 'required',            
            'name' => 'required',
            'lastname' => 'required',
            //'email' => 'required|email',
            'email' => 'required|email|unique:users,email',

            'pass' => 'required|min:8',
            'pass2' => 'required|min:8|same:pass'
        ];
        $messages = [
            'nick.required' => 'El nick de usuario es requerido',
            'name.required' => 'El nombre de usuario es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email.email' => 'El correo electrónico no es un correo válido',
            'email.unique' => 'Ya existe ese correo',            
            'pass.required' => 'La contraseña es requerida',
            'pass.min' => 'La contraseña debe tener un mínimo de 8 caracteres',
            'pass2.required' => 'La confirmación de contraseña es requerida',
            'pass2.min' =>'La confirmación de contraseña debe tener un mínimo de 8 caracteres',
            'pass2.same' => 'La confirmación de contraseña no coincide'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with(['message'=>'Se originó un error','typealert' => 'danger']);
        else:
            $user = new User();
            $user->nick = e($request->input('nick'));
            $user->name = e($request->input('name'));
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('pass'));
            if($user->save()):
                return redirect('/login')->with(['message' => 'El usuario ha sido registrado con éxito','typealert' =>'success']);
            endif;  
        endif;
    }

    public function logout(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
            return redirect('/login')->with(['message'=>'Su usuario ha sido suspendido','typealert' => 'danger']);
        else:
            return redirect('/');
        endif;
    }
}
