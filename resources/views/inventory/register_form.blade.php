@extends('layouts.app')

@section('content')
<!-- linea de gradiente  -->
<div class="fixed top-0 left-0 w-full h-screen bg-gradient-to-br from-[#2045c2] via-[#5a8ff2] to-[#b3d1ff]"></div>


<div class="min-h-screen flex items-center justify-center p-6">
    @if ($errors->any())

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong class="font-bold">¡Error!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    @endif

    @if (session('error'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('error') }}
            </div>
    @endif

    <!-- Formulario de Nuevo Embarque -->
    <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg border border-gray-200 relative z-10">
        <form action="{{route('RegisterMaterial')}}" method="post" class="p-8">
            @csrf
            <div class="space-y-6">
                <!-- Header -->
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-[#2045c2]">AGREGAR REGISTRO RECIBO/ENTRADA</h1>
                    <p class="text-gray-600 mt-1">Ingrese los detalles del nuevo Recibo/Entrada</p>
                </div>

                <!-- Código del Material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Código del Material
                    </label>
                    <input 
                        type="text" 
                        name="codigo" {{-- atributo de DB --}}
                        value="{{old('codigo')}}"

                        placeholder="Ingrese el código del material"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        required
                    >
                    @error('codigo')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Material
                    </label>
                    <input 
                        type="text"                        
                        name="nombre" {{-- atributo de DB --}}
                        value="{{old('nombre')}}"
                        placeholder="Ingrese el nombre del material"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        required
                    >
                    @error('nombre')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Categoría -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Categoría
                    </label>
                    <select 
                        name="categoria"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        required
                    >
                        <option value="" disabled selected>Seleccione una categoría</option>
                        <option value="Ferretería">Ferretería</option>
                        <option value="Electrónica">Electrónica</option>
                        <option value="Herramientas">Herramientas</option>
                    </select>
                </div>

                <!-- Cantidad -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Cantidad
                    </label>
                    <input 
                        type="number" 
                        name="unidad_medida"
                        name="unidad_medida" {{-- atributo de DB --}}
                        value="{{old('unidad_medida')}}"
                        placeholder="Ingrese la cantidad"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        min="1"
                        required
                    >
                    @error('unidad_medida')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ubicación (Deshabilitada) -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Ubicación
                    </label>
                    <input 
                        type="text" 
                        placeholder="Pendiente de asignar en área de Almacen"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        disabled
                    >
                    <p class="mt-2 text-sm text-gray-500">La ubicación será asignada en el área de Almacen</p>
                </div>
            </div>

            <!-- Botones de Acción -->
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
                Guardar
                </button>
            </div>
        </form>

        @if (isset($mensaje))
            <script>
                alert('{{$mensaje}}');
            </script>
        @elseif(session('mensaje'))
            <script>
                alert({{ session('mensaje') }})
            </script>
        @endif
    </div>
</div>
@endsection
