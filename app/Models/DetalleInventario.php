<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleInventario extends Model
{
    //
    use HasFactory;

    protected $table = 'detalles_inventario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'material_id',
        'estante_id',
        'cantidad',
        'fecha_ingreso',
        'observaciones',
    ];
}
