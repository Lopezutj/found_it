<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\DetalleInventario;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    

    //mostrar todos los materiales con y son ubicacion
    public function index(){
        
        $materialsinUbicacion=Material::whereDoesntHave('detalles')->get();//obtener detalles donde el estante_id sea NULL (sin ubicación)
        //dd($materialsinUbicacion); test
        $detalles=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        
        return view('Inventory.stock_view',compact('materialsinUbicacion','detalles'));
    }

    //registrar Material ala tabla materiales
    public function store(Request $request){
        //validacion de datos del formulario
        $request->validate([
            'codigo'=>'required',
            'nombre'=>'required',
            'categoria'=>'required',
            'unidad_medida'=>'required|min:0',
        ]);

        $material=Material::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'unidad_medida' => $request->unidad_medida,
        ]);

        return redirect()->route('register_form')->with('mensaje','Material registrado correctamente');
    }

    //mostrar material para editar
    public function edit($id){

        $material=Material::findOrFail($id);
        return view('inventory.register_location',compact('material'));
    }

    //actualizar material
    public function update(Request $request,$id){

        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'categoria' => 'required',
            'unidad_medida' => 'required',
            'cantidad' => 'required|integer',
        ]);

        $material = Material::findOrFail($id);
        $material->codigo = $request->codigo;
        $material->nombre = $request->nombre;
        $material->categoria = $request->categoria;
        $material->unidad_medida = $request->unidad_medida;
        $material->cantidad = $request->cantidad;
        $material->save(); //guarda ala base de datos

        return redirect()->route('')->with('mensaje','');
    }

    //eliminar material
    public function destroy($id){

        $material=Material::findOrFail($id);
        $material->delete();

        return redirect()->route('')->with('mensaje','');
    }
}
