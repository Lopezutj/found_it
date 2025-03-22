<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Barcode\BarcodeController;
use App\Http\Controllers\Inventory\DetalleInventarioController;
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

Route::get('/UsuarioEliminado/{id}',[AuthController::class,'deleteUser'])->name('UsuarioEliminado');

//vistar de dashboards
Route::middleware(['Middleware','auth'])->group(function(){
    Route::get('/Home',[AuthController::class,'index'])->name('Home');
    Route::get('/dashboard',[vistaController::class,'vistaDashborad'])->name('dashboard');//vista
    Route::get('/stock_view',[vistaController::class,'inventario_stock'])->name('stock_view');//vista
    Route::get('/part_with_material',[vistaController::class,'surtir_Material'])->name('part_with_material');//vista
    Route::get('/pull_out_material',[vistaController::class,'salida_material'])->name('pull_out_material');//vista
    Route::get('/gestion_embarque',[vistaController::class,'vista_Gestion'])->name('gestion_embarque');//vista
    Route::get('/register_form',[vistaController::class,'registrar_material'])->name('register_form');//vista
    Route::get('/userprofile',[vistaController::class,'userProfile'])->name('user.profile');//vista user nueva agregada
    Route::get('/Inventory_edit',[vistaController::class,'edit_inventario'])->name('Inventory_edit');
    //vistas modulo productos
    Route::get('/criticalProducts',[vistaController::class,'criticalProducts'])->name('critical_Products');
    Route::get('/totalProducts',[vistaController::class,'totalProducts'])->name('total_Products');
    Route::get('/expensiveproducts',[vistaController::class,'expensiveproducts'])->name('expensive_products');
    //Vistas de modulo workers
    Route::get('/workers',[vistaController::class,'workers'])->name('workers');
    Route::get('/registerworkers',[vistaController::class,'registerworkers'])->name('register_workers');
    Route::get('/editworkers',[vistaController::class,'editworkers'])->name('edit_workers');

    Route::get('/reports',[vistaController::class,'reports'])->name('reports');
    Route::get('/edit_material_modal',[vistaController::class,'edit_material_modal'])->name('edit_material_modal');
});

//Controladores
Route::middleware(['Middleware','auth'])->group(function(){
    Route::get('/Inventorystock',[MaterialController::class,'index'])->name('Inventorystock');
    Route::post('/RegisterMaterial',[MaterialController::class,'store'])->name('RegisterMaterial');
    Route::post('/Register_Detalle',[EstanteController::class,'storeUbicacionYDetalle'])->name('Register_Detalle');
    Route::post('/Register_ubicacion/{id}',[MaterialController::class,'edit'])->name('Register_ubicacion');
    Route::get('/Stock',[DetalleInventarioController::class,'indexDetalle'])->name('Stock');
    Route::get('/StockSurtido',[DetalleInventarioController::class,'indexDetalleSurtido'])->name('StockSurtido');
    Route::post('/Select_Material',[DetalleInventarioController::class,'mostrarMaterialArray'])->name('Select_Material');
    Route::put('/Exist_Material',[DetalleInventarioController::class,'ProcesarSeleccion'])->name('Exist_Material');
    Route::get('/SearchE',[DetalleInventarioController::class,'buscarEmbarques'])->name('SearchE');
    Route::get('/SearchS',[DetalleInventarioController::class,'buscarSurtido'])->name('SearchS');
    Route::get('/SearchC',[DetalleInventarioController::class,'buscarconteos'])->name('SearchC');
    Route::get('/barcode/{numeroParte}', [BarcodeController::class, 'generadorCodigoBar'])->name('barcode'); //ruta para generar barcode
    Route::get('/Trabajadores',[AuthController::class, 'indexUsers'])->name('Trabajadores');

});


Route::middleware(['Middleware','auth'])->group(function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout_user');//cerrar sesion usuario
});

