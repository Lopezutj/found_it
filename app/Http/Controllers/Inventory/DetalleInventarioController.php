<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\DetalleInventario;
use App\Models\Estante;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class DetalleInventarioController extends Controller
{
    //
    // Mostrar todos los registros de inventario en Gestion de envarques
    public function indexDetalle()
    {
        $detalleInventario=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        return view('inventory.gestion_embarques',compact('detalleInventario'));
    }

    public function indexDetalleSurtido()
    {
        $detalleInventario=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        return view('inventory.part_with_material',compact('detalleInventario'));
    }

    // Mostrar el formulario para registrar un nuevo detalle de inventario
    public function create()
    {
        $detalles = DetalleInventario::with(['materiales','estantes','users'])->get();
        
        return view('',compact('detalles'));
        
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

    public function ProcesarSeleccion(Request $request){

        $idsSelecionados =$request->input('detalleInventario',[]);//recibe ids en un array 

        if(empty($idsSelecionados)){
            return redirect()->back()->with('error','No selecionaste ningun material');
        }

        //Procesar lo materiales seleccionados
        DB::transaction(function()use ($idsSelecionados){
            //elimnar los registros de detalle_inventario
            DetalleInventario::where('id',$idsSelecionados->delete());

            //Eliminar registros de materiales
            Material::where('id',$idsSelecionados->delete());
            //Eliminar registro de Estante
            Estante::where('id',$idsSelecionados->delete());
        });

        return redirect()->back()->with('error','Eliminado con exito');
    }

    public function mostrarArrayids(){
        
    }
}
