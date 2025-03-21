<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    //Autentificaciones

    public function indexUsers ()
    {
        $users=User::all();

        if(!isEmpty($users)){
            return Redirect()->back()->with('Error', 'No hay usuarios');
        }

        return view('workers.workers' , compact('users'));

    }

    //Funcion autentificacion
    public function authenticate(Request $request){
        //validar credenciales
        $credenciales =$request->validate([
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ],[
            'password.min'=>'La contraseña debe tener al menos 6 caracter.'
        ]);

        //intentar autenticar usuario
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate(); //regenera la session para seguridad

            return redirect()->route('dashboard')->with('mensaje','Inicio de sesion exitoso');
        }

        //si falla redirigir con error
        return redirect()->back()->withErrors(['email'=>'Error Credenciales Incorrectas'])
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

            return redirect()->route('workers')->with('mensaje','Usuario Creado Con Exito');

    }

    //cerrar sesion
    public function logout(Request $request){

        Auth::logout(); //Cierra la sesion del usuario

        $request->session()->invalidate(); //invalida la sesion
        $request->session()->regenerateToken(); //regenera el token CSRF
        return redirect('/')->with('mensaje','Sesion Cerrada Correctamente');

    }
    public function deleteUser(Request $request, $id){
        // Buscar al usuario por su ID
        $user = User::find($id);

        // Verificar si el usuario existe antes de intentar eliminarlo
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        // Eliminar el usuario
        $user->delete();

        return redirect()->route('workers')->with('mensaje','Usuario eliminado correctamente');
    }

}
