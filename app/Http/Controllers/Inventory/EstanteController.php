<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\DetalleInventario;
use App\Models\Estante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstanteController extends Controller
{
    

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
    public function storeUbicacionYDetalle(Request $request){

        DB::transaction(function ()use($request){
            //validacion de datos 
            $request->validate([
                'material_id' => 'required|exists:materiales,id', //obtenemos el del id material
                'unidad_medida' => 'required|exists:materiales,unidad_medida',
                'pasillo'=>'required',
                'columna'=>'required',
                'fila'=>'required',
                'almacen'=>'required',
            ]);

            //registrar en el estante
            $estante=Estante::create([
                'user_id' => Auth::id(),
                'pasillo' => $request->pasillo,
                'columna' => $request->columna,
                'fila' => $request->fila,
                'almacen' => $request->almacen
            ]);

            //registrar en el datalle_inventario
            DetalleInventario::create([
                'user_id' => Auth::id(),
                'material_id' => $request->material_id, //registrar el id del material selecionado
                'estante_id' => $estante->id, //Relacion de ubicacion al con el material
                'cantidad' => $request->unidad_medida,
                'fecha_ingreso' => now(),
                'observaciones' => 'Ubicación asignada después del registro del material.',

            ]);
            
        });
        return redirect()->route('Inventorystock')->with('mensaje','');
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
