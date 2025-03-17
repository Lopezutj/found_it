@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-foundit-blue">Perfil de Usuario</h1>
        <p class="text-gray-600 mt-1">Información de tu cuenta</p>
    </div>

    <!-- Información del Usuario -->
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Encabezado del Perfil -->
        <div class="bg-foundit-blue text-white p-6">
            <div class="flex items-center">
                <div class="h-20 w-20 rounded-full bg-white flex items-center justify-center text-foundit-blue text-2xl font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-bold">Nombre del Usuario</h2>
                    <p class="text-white/80">usuario@ejemplo.com</p>
                </div>
            </div>
        </div>

        <!-- Detalles del Usuario -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-500">Nombre</label>
                    <div class="text-lg font-medium text-gray-900 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        Nombre del Usuario
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-500">Email</label>
                    <div class="text-lg font-medium text-gray-900 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        usuario@ejemplo.com
                    </div>
                </div>

                <!-- Rol -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-500">Rol</label>
                    <div class="text-lg font-medium text-gray-900 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        Administrador
                    </div>
                </div>

                <!-- Estatus -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-500">Estatus</label>
                    <div class="text-lg font-medium p-3 bg-gray-50 rounded-lg border border-gray-200">
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Activo
                        </span>
                    </div>
                </div>

                <!-- Fecha de Registro -->
                <div class="space-y-2 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-500">Fecha de Registro</label>
                    <div class="text-lg font-medium text-gray-900 p-3 bg-gray-50 rounded-lg border border-gray-200">
                        01/01/2023 12:00
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="mt-8 flex justify-end">
                <button 
                    type="button"
                    class="px-6 py-3 text-lg font-medium text-white bg-foundit-blue rounded-lg hover:bg-foundit-blue/90 shadow-md"
                >
                    Editar Perfil
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
