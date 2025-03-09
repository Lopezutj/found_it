<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'activo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //relaciones
    // Relación: un usuario puede tener muchos estantes
    public function estante(){
        return $this->hasMany(Estante::class);
    }
    // Relación: un usuario puede tener muchos registros en el inventario
    public function detalleInventario(){
        return $this->hasMany(DetalleInventario::class);
    }

    // Verifica si el usuario es administrador
    public function isAdmin()
    {
        return $this->role === 'administrador';
    }

    // Verifica si el usuario es operador
    public function isOperador()
    {
        return $this->role === 'operador';
    }
}
