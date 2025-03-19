@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header - Con fondo blanco más tenue -->
        <div class="mb-6">
            <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded">Recibo/Entrada</h1>
        </div>

        <!-- Sección de Localizar Material - Diseño mejorado -->
        <div class="mb-6 bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-[#2045c2] mb-4">Localizar material</h2>
                    <div class="flex gap-4 flex-col md:flex-row">
                        <!-- Búsqueda -->
                        <div class="flex-1">
                            <form action="{{route('SearchE')}}" method="GET">

                                <div class="relative flex">
                                    <input 
                                    type="text" 
                                    id="searchInput" 
                                    name="busqueda"
                                    class="w-full h-10 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]" 
                                    placeholder="Buscar por código o nombre..."
                                    >
                                    <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    class="h-5 w-5 absolute left-3 top-2.5 text-[#2045c2]"
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke="currentColor"
                                    >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <button class="h-10 px-4 bg-[#2045c2] text-white rounded-r-lg hover:bg-[#1a3aa3] shadow-md transition-colors duration-150">
                                    Buscar
                                </button>
                            </div>
                        </form>
                        </div>

                        <!-- Filtros -->
                        <div class="flex gap-4 md:w-auto">
                            <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                                <option value="">Todas las categorías</option>
                                <option value="ferreteria">Ferretería</option>
                                <option value="electronica">Electrónica</option>
                                <option value="herramientas">Herramientas</option>
                            </select>
                            <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                                <option value="">Ordenar por</option>
                                <option value="codigo">Código</option>
                                <option value="nombre">Nombre</option>
                                <option value="ubicacion">Ubicación</option>
                            </select>
                        </div>

                        <!-- Botón Material -->
                        <button onclick="window.location.href='{{route('register_form')}}'" class="h-10 px-6 bg-[#2045c2] text-white rounded-lg hover:bg-[#1a3aa3] shadow-md transition-colors duration-150">
                            Nuevo material
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Materiales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <!-- El contenido de la tabla -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#e6ebfa]">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barcode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Ejemplo de fila -->
                        @foreach ( $detalleInventario as $inventario )
                        
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$inventario->material->codigo}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><img src="{{ route('barcode', ['numeroParte' => $inventario->material->codigo]) }}" alt="Código de Barras"
                                style="width: 150px; height: 50px;"
                                ></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->nombre}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->categoria}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->unidad_medida}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->estante->pasillo}}-{{$inventario->estante->columna}}-{{$inventario->estante->fila}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button onclick="openHistoryModal('MAT001')" class="text-[#2045c2] hover:text-[#ff3333] transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="stroke: currentColor;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                <button onclick="location.assign('{{route('Inventory_edit')}}')" class="text-[#2045c2] hover:text-[#ff3333] transition-colors duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="stroke: currentColor;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($detalleInventario->isEmpty())
                    <p class="p-4 text-gray-500">No se encontraron resultados.</p>
                @endif
            </div>
        </div>
    </div>


    <!-- Modal de Edición -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    
    </div>

    <!-- Modal de Nuevo Material -->
    <div id="newMaterialModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
    
    </div>

    <!-- De aqui es el codigo para el fondo de pantalla img pantalla completa -->
    <div id="background-overlay" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('img/imgingreso.jpg') }}');
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