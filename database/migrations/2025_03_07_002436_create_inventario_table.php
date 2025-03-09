<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        // Tabla de estantes: cada estante pertenece a un usuario (tabla "users" por defecto)
        Schema::create('estantes', function (Blueprint $table) {
            $table->id();
            // Utilizamos foreignId() para que se genere un unsignedBigInteger y se vincule con users.id
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->string('pasillo');
            $table->integer('columna');
            $table->integer('fila');
            $table->string('almacen');
            $table->timestamps();
        });

        // Tabla de materiales: almacena la información de cada material
        Schema::create('materiales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('codigo')->unique();
            $table->string('unidad_medida');
            $table->string('categoria');
            $table->timestamps();
        });

        // Tabla central: detalles_inventario
        // Relaciona la tabla de usuarios (por defecto), estantes y materiales
        Schema::create('detalles_inventario', function (Blueprint $table) {
            $table->id();
            // Usuario que registra el detalle (la relación se forma con users.id)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');
            // Material involucrado
            $table->foreignId('material_id')
                  ->constrained('materiales')
                  ->onDelete('cascade');
            // Estante donde se ubica el material
            $table->foreignId('estante_id')
                  ->constrained('estantes')
                  ->onDelete('cascade');
            $table->integer('cantidad')->default(0);
            $table->timestamp('fecha_ingreso')->useCurrent();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down(): void
    {
        // Eliminar en el orden inverso para evitar problemas con claves foráneas
        Schema::dropIfExists('detalles_inventario');
        Schema::dropIfExists('materiales');
        Schema::dropIfExists('estantes');
    }
};
