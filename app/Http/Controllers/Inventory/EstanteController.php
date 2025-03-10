<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Estante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstanteController extends Controller
{
    //

    //mostrar todos los estantes
    public function index(){
        $estante=Estante::all();
        return view('',compact('estante'));
    }

    //Mostrar el formulario para crear nuevo estante
    public function create() {
        return view('');
    }

    //guardar nuevo estante
    public function store(Request $request){
        $request->validate([
            'pasillo'=>'required|unique:estante,codigo',
            'columna'=>'required',
            'fila'=>'required',
            'almacen'=>'required',
        ]);

        $estante=new Estante();
        $estante->user_id=Auth::id();
        $estante->pasillo=$request->pasillo;
        $estante->columna=$request->columna;
        $estante->fila=$request->fila;
        $estante->save();
        return redirect()->route('')->with('mensaje','');
    }

    //mostrar el formulario para editar estantes
    public function edit($id){
        $estante=Estante::findOrFail($id);
        return view('',compact('estante'));

    }

    public function update(Request $request,$id){  
        
        $request->validate([
            'pasillo'=>'required|unique:estante,codigo',
            'columna'=>'required',
            'fila'=>'required',
            'almacen'=>'required',
        ]);

        $estante=Estante::findOrFail($id);
        $estante->user_id=Auth::id();
        $estante->pasillo=$request->pasillo;
        $estante->columna=$request->columna;
        $estante->fila=$request->fila;
        $estante->save();
        return redirect()->route('')->with('mensaje','');

    }

    public function destroy($id){
        $estante=Estante::findOrFail($id);
        $estante->delete();

        return redirect()->route('')->with('mensaje','');

    }
}
