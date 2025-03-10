<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\DetalleInventario;
use App\Models\Estante;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class DetalleInventarioController extends Controller
{
    //
    // Mostrar todos los registros de inventario
    public function index()
    {
        $detalle=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        return view('',compact('detalle'));

    }

    // Mostrar el formulario para registrar un nuevo detalle de inventario
    public function create()
    {
        $materiales= Material::all();
        $estantes=Estante::all();
        
        return view('',compact('materiales','estante'));
        
    }

    // Guardar un nuevo detalle de inventario
    public function store(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materiales,id',
            'estante_id' => 'required|exists:estantes,id',
            'cantidad' => 'required|integer',
        ]);

        $detalle=new DetalleInventario();
        $detalle->user_id=Auth::id();
        $detalle->material_id=$request->material_id;
        $detalle->estante_id=$request->estante_id;
        $detalle->cantidad=$request->cantidad;
        $detalle->observaciones=$request->observaciones;
        $detalle->save();

        return redirect()->route('')->with('mensaje','');
    }

    // Mostrar el formulario para editar un detalle de inventario
    public function edit($id)
    {
        $detalle=DetalleInventario::findOrFail($id);
        $materiles= Material::all();//obtner todos los materiales
        $estantes= Estante::all();//obtener todos los estantes

        return view('',compact('detalle','materiales','estantes'));

    }

    // Actualizar un detalle de inventario
    public function update(Request $request, $id)
    {
        $request->validate([
            'material_id'=>'required|exists:materiales,id',
            'estante_id'=>'required|exists:estantes,id',
            'cantidad'=>'required|integer',
        ]);

        $detalle=DetalleInventario::findOrFail($id);
        $detalle->material_id=$request->material_id;
        $detalle->estante_id=$request->estante_id;
        $detalle->cantidad=$request->cantidad;
        $detalle->observaciones=$request->observaciones;
        $detalle->save();
        
        return redirect()->route('')->with('mensaje','');
    }

    // Eliminar un detalle de inventario
    public function destroy($id)
    {
        $detalle = DetalleInventario::findOrFail($id);
        $detalle->delete();

        return redirect()->route('')->with('mensaje','');
    
    }
}
