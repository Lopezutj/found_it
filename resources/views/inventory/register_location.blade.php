@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#2045c2]">Asignar Ubicación</h1>
        <p class="text-gray-600 mt-1">Seleccione la ubicación para el material</p>
    </div>

    <!-- Formulario -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{route('Register_Detalle',['id'=>$material->id])}}" method="POST" class="p-8">
            @csrf

            <div class="space-y-6">
                <!-- Material No editable -->
                <div class="grid grid-cols-2 gap-6 pb-6 border-b border-gray-200">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Código del Material
                        </label>
                        <input 
                            type="text"
                            name="codigo" 
                            value="{{$material->codigo}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Material
                        </label>
                        <input 
                            type="text" 
                            name="nombre"
                            value="{{$material->nombre}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Categoría
                        </label>
                        <input 
                            type="text" 
                            name="categoria"
                            value="{{$material->categoria}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">
                            Cantidad
                        </label>
                        <input 
                            type="text" 
                            name="cantidad"
                            value="{{$material->cantidad}}"
                            class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-700"
                            readonly
                        >
                    </div>
                </div>

                <!-- Selector de Ubicación -->
                <div class="pt-4">
                    <h3 class="text-lg font-medium text-[#2045c2] mb-6">Seleccionar Nueva Ubicación</h3>
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <!-- Selector de Almacén -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Almacén</label>
                            <select 
                                name="almacen"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                required
                            >
                                <option value="">Seleccione almacén</option>
                                <option value="JW1">JW1</option>
                                <option value="JW2">JW2</option>
                                <option value="JW3">JW3</option>
                                <option value="JW4">JW4</option>
                            </select>
                        </div>

                        <!-- Selector de Pasillo -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Pasillo</label>
                            <select 
                                name="pasillo"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                required
                            >
                                <option value="">Seleccione pasillo</option>
                                <option value="P1">Pasillo 1</option>
                                <option value="P2">Pasillo 2</option>
                                <option value="P3">Pasillo 3</option>
                                <option value="P4">Pasillo 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <!-- Selector de Columna -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Columna</label>
                            <select 
                                name="columna"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                required
                            >
                                <option value="">Seleccione columna</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>

                        <!-- Selector de Fila -->
                        <div>
                            <label class="block text-base font-medium text-gray-700 mb-2">Fila</label>
                            <select 
                                name="fila"
                                class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                required
                            >
                                <option value="">Seleccione fila</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <button 
                    type="button"
                    onclick="history.back()" 
                    class="px-6 py-3 text-lg font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5]"
                >
                    Cancelar
                </button>
                <button 
                    type="submit"
                    class="px-6 py-3 text-lg font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md"
                >
                    Guardar Ubicación
                </button>
            </div>
        </form>
    </div>
</div>
@endsection