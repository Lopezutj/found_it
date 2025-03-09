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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function estante()
    {
        return $this->belongsTo(Estante::class);
    }
}
