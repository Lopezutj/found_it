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
    public function     indexDetalle()
    {
        $detalleInventario=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        return view('inventory.stock_view',compact('detalleInventario'));
    }

    public function indexDetalleSurtido()
    {
        $detalleInventario=DetalleInventario::with(['material','estante','user'])->get();//relacionar las tablas para consultar
        return view('inventory.part_with_material',compact('detalleInventario'));
    }

    public function mostrarMaterialArray(Request $request){
            $idsSeleccionados=$request->input('detalleInventario',[]);
            if(empty($idsSeleccionados)){
                return redirect()->back()->with('error','No selecionaste ningun material');
            }

            //obtener detalles del inventario selecionados
            $selectMateriales=DetalleInventario::whereIn('id',$idsSeleccionados)->get();
            
            return view('inventory.pull_out_material',compact('selectMateriales'));
    
    }

    public function ProcesarSeleccion(Request $request){

        $request->validate([
            'materiales'=>'required|array',
            'materiales.*.id'=> 'required|exists:materiales,id',
            'materiales.*.surtir' => 'required|integer|min:1',
        ]);

        DB::transaction(function() use ($request){
            foreach($request->materiales as $id=>$data){ //recorrer para aplicar modificacion para cada uno
                $material =Material::findOrFail($data['id']);

                //validamos que no sea mayor ala cantidad disponible
                if($data['surtir'] > $material->unidad_medida){
                    return redirect()->back()->with('error','No se puede surtir mas de la cantidad disponible.');
                }

                //restamos la cantidad surtida ala cantidad disponible
                $material->update([
                    'unidad_medida'=>$material->unidad_medida - $data['surtir']
                ]);

                //si se surte cantida completa se elimia registro 
                if($material->unidad_medida == 0){

                    $material->detalles()->each(function($detalle){
                        $detalle->estante()->delete();//eliminar con relacion estante
                        $detalle->delete();
                    }); 

                    $material->delete(); //eliminar material

                    /* //elimiar tabla relacionada
                    $material->detalles()->delete();
                    //eliminar el material
                    $material->delete(); */
                }
            }
        });
        
        $detalleInventario=DetalleInventario::with(['material','estante','user'])->get();
        
        return view('inventory.part_with_material',compact('detalleInventario'));
    }
    

    public function buscarEmbarques(Request $request){
        $query=$request->input('busqueda');//capturar el valor del input buscar

        //busqueda usando join
        $detalleInventario = DetalleInventario::whereHas('material', function ($q) use ($query) {
            $q->where('codigo', 'LIKE','%' . $query . '%')
                ->orWhere('nombre', 'LIKE', '%' . $query . '%');
        })->get();
        
        
        return view('inventory.gestion_embarques',compact('detalleInventario'));
    }

    public function buscarconteos(Request $request){
        $query=$request->input('busqueda');//capturar el valor del input buscar

        //busqueda usando join
        $detalleInventario = DetalleInventario::whereHas('material', function ($q) use ($query) {
            $q->where('codigo', 'LIKE','%' . $query . '%')
                ->orWhere('nombre', 'LIKE', '%' . $query . '%');
        })->get();
        
        $materialsinUbicacion=Material::whereDoesntHave('detalles')->get();
        
        
        return view('inventory.stock_view',compact('detalleInventario','materialsinUbicacion'));
    }

    public function buscarSurtido(Request $request){
        $query=$request->input('busqueda');//capturar el valor del input buscar

        //busqueda usando join
        $detalleInventario = DetalleInventario::whereHas('material', function ($q) use ($query) {
            $q->where('codigo', 'LIKE','%' . $query . '%')
                ->orWhere('nombre', 'LIKE', '%' . $query . '%');
        })->get();
        
        
        return view('inventory.part_with_material',compact('detalleInventario'));
    }

    public function filtrarBajoinventario(){
        $inventarioBajo = DetalleInventario::with(['material','estante','user'])//relacionar tablas para la consulta
        ->where('cantidad','<',1000)//condicion
        ->get();

        return view('products.critical_products',compact('inventarioBajo'));
    }

}
