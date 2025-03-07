<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estante extends Model
{
    //
    use HasFactory;

    protected $table = 'estante'; //nombre de tabla
    protected $primaryKey = 'id'; //llave primaria

    protected $fillable=[
        'user_id',
        'pasillo',
        'columna',
        'fila',
        'almacen',
    ];

    //funciones de realacion

}
