<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Autentificaciones

    public function index(){
        
    }
    
    //Funcion autentificacion
    public function authenticate(Request $request){
        //validar credenciales
        $credenciales =$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);
        
        //intentar autenticar usuario
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate(); //regenera la session para seguridad

            return redirect()->route('dashboard')->with('mensaje','Inicio de sesion exitoso');
        }

        //si falla redirigir con error
        return back()->withErrors(['email'=>'Las credenciales no coinciden en nuestro registro'])
        ->onlyInput('email');
    }

    //Funcion crear Usuario
    public function create(Request $request){

            //validar datos del formulario
            $request->validate([
                'name'=>'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:users',
                'password'=>'required|string|min:6',
                'rol'=>'required|string|max:255',
                'activo'=>'nullable|boolean',
            ]);

            //crea usuario ala base de datos
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rol'=>$request->rol,
                'activo'=>$request->activo ?? 1,  // Establece 'activo' a 1 por defecto
            ]);

            return redirect()->route('login')->with('mensaje','Usuario Creado Con Exito');

    }

    //cerrar sesion
    public function logout(Request $request){
        
        Auth::logout(); //Cierra la sesion del usuario

        $request->session()->invalidate(); //invalida la sesion
        $request->session()->regenerateToken(); //regenera el token CSRF
        return redirect('/')->with('mensaje','Sesion Cerrada Correctamente');

    }
}
