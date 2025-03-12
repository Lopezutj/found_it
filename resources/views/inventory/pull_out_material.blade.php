@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#2045c2]">Surtir Material</h1>
    </div>

    <!-- Contenedor con scroll horizontal para los materiales -->
    <div class="w-full overflow-x-auto pb-4">
        <!-- Materiales en fila horizontal -->
        <div class="flex flex-nowrap gap-4 min-w-full">
            <!-- Material 1 -->
            <div class="flex-none w-[350px] bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md">
                <dl class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Código</dt>
                        <dd class="text-lg font-medium text-gray-900">MAT001</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Material</dt>
                        <dd class="text-lg text-gray-900">Tornillos M4</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Almacén</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">JW1</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Pasillo</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">P1</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">A-01</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Disponible</dt>
                        <dd class="text-lg font-semibold text-[#2045c2]">1500 unidades</dd>
                    </div>
                </dl>
                
                <div class="flex flex-col space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Unidades a surtir:
                        </label>
                        <div class="flex items-center">
                            <input 
                                type="number" 
                                class="w-20 h-10 text-center rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                placeholder="0"
                                min="1"
                                max="1500"
                            >
                            <span class="ml-2 text-sm text-gray-500">unidades</span>
                        </div>
                    </div>
                    
                    <button 
                        type="button" 
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center justify-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Localizar
                    </button>
                </div>
            </div>

            <!-- Material 2 -->
            <div class="flex-none w-[350px] bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md">
                <dl class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Código</dt>
                        <dd class="text-lg font-medium text-gray-900">MAT002</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Material</dt>
                        <dd class="text-lg text-gray-900">Tuercas M4</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Almacén</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">JW2</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Pasillo</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">P2</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">A-03</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Disponible</dt>
                        <dd class="text-lg font-semibold text-[#2045c2]">2500 unidades</dd>
                    </div>
                </dl>
                
                <div class="flex flex-col space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Unidades a surtir:
                        </label>
                        <div class="flex items-center">
                            <input 
                                type="number" 
                                class="w-20 h-10 text-center rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                placeholder="0"
                                min="1"
                                max="2500"
                            >
                            <span class="ml-2 text-sm text-gray-500">unidades</span>
                        </div>
                    </div>
                    
                    <button 
                        type="button" 
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center justify-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Localizar
                    </button>
                </div>
            </div>

            <!-- Material 3 -->
            <div class="flex-none w-[350px] bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md">
                <dl class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Código</dt>
                        <dd class="text-lg font-medium text-gray-900">MAT003</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Material</dt>
                        <dd class="text-lg text-gray-900">Arandelas 5mm</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Almacén</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">JW3</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Pasillo</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">P3</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">B-01</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Disponible</dt>
                        <dd class="text-lg font-semibold text-[#2045c2]">3000 unidades</dd>
                    </div>
                </dl>
                
                <div class="flex flex-col space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Unidades a surtir:
                        </label>
                        <div class="flex items-center">
                            <input 
                                type="number" 
                                class="w-20 h-10 text-center rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                placeholder="0"
                                min="1"
                                max="3000"
                            >
                            <span class="ml-2 text-sm text-gray-500">unidades</span>
                        </div>
                    </div>
                    
                    <button 
                        type="button" 
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center justify-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Localizar
                    </button>
                </div>
            </div>

            <!-- Material 4 (ejemplo para mostrar scroll) -->
            <div class="flex-none w-[350px] bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md">
                <dl class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Código</dt>
                        <dd class="text-lg font-medium text-gray-900">MAT004</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Material</dt>
                        <dd class="text-lg text-gray-900">Cable 2.5mm</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Almacén</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">JW4</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Pasillo</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">P4</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                        <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded">C-04</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Disponible</dt>
                        <dd class="text-lg font-semibold text-[#2045c2]">500 unidades</dd>
                    </div>
                </dl>
                
                <div class="flex flex-col space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-medium text-gray-700">
                            Unidades a surtir:
                        </label>
                        <div class="flex items-center">
                            <input 
                                type="number" 
                                class="w-20 h-10 text-center rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                placeholder="0"
                                min="1"
                                max="500"
                            >
                            <span class="ml-2 text-sm text-gray-500">unidades</span>
                        </div>
                    </div>
                    
                    <button 
                        type="button" 
                        class="w-full px-3 py-2 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center justify-center gap-1"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        Localizar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="flex justify-center gap-4 mt-8 bg-[#f8fafc] p-4 rounded-lg border border-gray-200">
        <button 
            type="button"
            onclick="history.back()" 
            class="px-8 py-3 text-lg font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5]"
        >
            Cancelar
        </button>
        <button 
            type="submit"
            class="px-8 py-3 text-lg font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md"
        >
            Confirmar Salida
        </button>
    </div>
</div>
@endsection