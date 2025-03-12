<?php

namespace App\Models;

use App\Http\Controllers\Inventory\DetalleInventarioController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Material extends Model
{
    use HasFactory;
    protected $table = 'materiales';

    protected $primaryKey = 'id';

    protected $fillable =[
        'id',
        'nombre',
        'descripcion',
        'codigo',
        'unidad_medida',
        'categoria',
    ];

    public function detallesInventario()
    {
        return $this->hasMany(related: DetalleInventario::class);
    }

    //relacion con detalles inventario
    public function detalles(){
        return $this->hasMany(DetalleInventario::class,'material_id','id');
    }

}
