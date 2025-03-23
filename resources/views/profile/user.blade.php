@extends('layouts.app')

@section('content')
<div class="p-6">
     <!-- Contenido Principal -->
     <main class="flex-1 p-6">
        <!-- Encabezado de la página - Título y descripción -->
        <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded" title="Formulario para modificar los detalles de un material existente">PERFIL USUARIO <p class="text-gray-600 mt-2 text-sm">Información de tu cuenta</p></h1>
        </div>

        <!-- Tarjeta principal - Contiene toda la info del perfil -->
        <div class="bg-white rounded-lg shadow-lg p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Avatar y Datos Principales - Lado izquierdo -->
            <div class="col-span-1 flex flex-col items-center">
                <!-- Avatar del usuario - Por ahora solo un círculo con iniciales o icono -->
                <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center text-[#2045c2] text-2xl font-bold" title="Avatar de usuario">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <!-- Nombre y correo del usuario - Datos básicos de identificación -->
                <h2 class="mt-4 text-xl font-bold" title="Nombre completo del usuario">{{ auth()->user()->name }}</h2>
                <p class="text-gray-500" title="Correo electrónico de acceso al sistema">{{ auth()->user()->email }}</p>
            </div>

            <!-- Información del Usuario - Lado derecho, datos más específicos -->
            <div class="col-span-2 grid grid-cols-2 gap-4">
                <!-- Rol del usuario - Muestra el tipo de acceso que tiene -->
                <div>
                    <p class="text-sm font-medium text-gray-500" title="Nivel de permisos en el sistema">CARGO</p>
                    <p class="text-lg font-medium text-gray-900" title="Define las funciones a las que tienes acceso">
                        @switch(auth()->user()->rol)
                            @case('adm')
                                Administrador
                                @break
                            @case('oper')
                                Operador
                                @break
                            @default
                                {{ auth()->user()->rol }}
                        @endswitch
                    </p>
                </div>

                <!-- Estado de la cuenta - Activo/Inactivo con colores para diferenciar -->
                <div>
                    <p class="text-sm font-medium text-gray-500" title="Estado actual de tu cuenta">ESTATUS</p>
                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ auth()->user()->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}" title="{{ auth()->user()->activo ? 'Tu cuenta está activa y puedes acceder al sistema' : 'Tu cuenta está inactiva, contacta al administrador' }}">
                        {{ auth()->user()->activo ? 'Activo' : 'Inactivo' }}
                    </span>
                </div>
                
                <!-- Fecha de registro - Cuándo se creó la cuenta -->
                <div class="col-span-2">
                    <p class="text-sm font-medium text-gray-500" title="Fecha en que tu cuenta fue creada">FECHA DE REGISTRO</p>
                    <p class="text-lg font-medium text-gray-900" title="Fecha y hora de creación de tu cuenta">{{ auth()->user()->created_at }}</p>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Código para el fondo de pantalla img pantalla completa -->
<div id="background-overlay" style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('img/user.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: -9999;
    pointer-events: none;
"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const overlay = document.getElementById('background-overlay');
        document.body.prepend(overlay);
        
        // fondo semitransparente
        const mainContainer = document.querySelector('.min-h-screen');
        if (mainContainer) {
            mainContainer.style.backgroundColor = 'rgba(19, 18, 18, 0.4)';
        }
    });
</script>
@endsection