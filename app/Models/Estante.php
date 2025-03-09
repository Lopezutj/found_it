<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estante extends Model
{
    //
    use HasFactory;
    protected $table = 'estante';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'pasillo',
        'columna',
        'fila',
        'almacen',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detallesInventario()
    {
        return $this->hasMany(DetalleInventario::class);
    }
}
