<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\view\vistaController;
use Illuminate\Support\Facades\Route;

//ruta inicio sin middleware
Route::get('/',[vistaController::class,'__invoke'])->name('login');
Route::get('/Register_view',[vistaController::class,'vistaregisterUser'])->name('registrarUsuario');

//rutas sin middleware
Route::post('/Register_user',[AuthController::class,'create'])->name('Register_user');//regitro de usuario
Route::post('/Login',[AuthController::class,'authenticate'])->name('login_user');//inicio sesion usuario
Route::get('/logout',[AuthController::class,'logout'])->name('logout_user');//cerrar sesion usuario

Route::get('/dashboard',[vistaController::class,'vistaDashborad'])->middleware('auth')->name('dashboard');