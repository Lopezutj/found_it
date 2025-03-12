<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Inventory\EstanteController;
use App\Http\Controllers\Inventory\MaterialController;
use App\Http\Controllers\view\vistaController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

//ruta inicio sin middleware
Route::get('/',[vistaController::class,'__invoke'])->name('login');
Route::get('/Register_User',[vistaController::class,'vistaregisterUser'])->name('registrarUsuario');

//rutas sin middleware
Route::post('/Register_user',[AuthController::class,'create'])->name('Register_user');//regitro de usuario
Route::post('/Login',[AuthController::class,'authenticate'])->name('login_user');//inicio sesion usuario

//vistar de dashboards
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[vistaController::class,'vistaDashborad'])->name('dashboard');//vista
    Route::get('/stock_view',[vistaController::class,'inventario_stock'])->name('stock_view');//vista
    Route::get('/part_with_material',[vistaController::class,'surtir_Material'])->name('part_with_material');//vista
    Route::get('/pull_out_material',[vistaController::class,'salida_material'])->name('pull_out_material');//vista
    Route::get('/gestion_embarque',[vistaController::class,'vista_Gestion'])->name('gestion_embarque');//vista
    Route::get('/register_form',[vistaController::class,'registrar_material'])->name('register_form');//vista
    Route::post('/Register_ubicacion/{id}',[MaterialController::class,'edit'])->name('Register_ubicacion');
    
});

//Controladores
Route::middleware('auth')->group(function(){
    Route::get('/Inventorystock',[MaterialController::class,'index'])->name('Inventorystock');
    Route::post('/RegisterMaterial',[MaterialController::class,'store'])->name('RegisterMaterial');
    Route::post('/Register_Detalle',[EstanteController::class,'storeUbicacionYDetalle'])->name('Register_Detalle');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout_user');//cerrar sesion usuario
});

