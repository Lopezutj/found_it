@extends('layouts.app')

@section('content')
    <div class="p-6 relative">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <!-- Título con fondo semitransparente para mejor legibilidad -->
            <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded">GESTIÓN SURTIDO</h1>

            <!-- Formulario para seleccionar materiales - Inicialmente vacío -->
            <form action="{{ route('Select_Material') }}" method="POST" id="surtirForm">
                @csrf
                {{-- Botón de surtir deshabilitado hasta que se seleccionen materiales --}}
                {{-- <button type="submit"
                        id="surtirButton"
                        disabled
                        class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg hover:bg-gray-400 transition-colors duration-150 disabled:opacity-50 disabled:cursor-not-allowed enabled:bg-[#2045c2] enabled:text-white enabled:hover:bg-[#1a3aa3] enabled:shadow-md">
                    Surtir Material
                </button> --}}
                
            </form>
        </div>

        <!-- Búsqueda y Filtros - Sección para filtrar y buscar materiales -->
        <div class="mb-6 bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Búsqueda - Campo de texto con botón para buscar materiales -->
                <div class="flex-1">
                    <form action="{{route('SearchS')}}" method="GET">
                        <!-- Formulario de búsqueda con icono integrado -->
                        <div class="relative flex">
                            <input 
                                type="text"
                                name="busqueda"
                                placeholder="Buscar por código o nombre..."
                                class="w-full h-10 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                            >
                            <!-- Icono de lupa para la búsqueda -->
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-5 w-5 absolute left-3 top-2.5 text-[#2045c2]"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <!-- Botón de búsqueda -->
                            <button 
                                type="submit"
                                class="h-10 px-4 bg-[#2045c2] text-white rounded-r-lg hover:bg-[#1a3aa3] shadow-md"
                            >
                                Buscar
                            </button>
                        </div>
                        </div>
                    </form>

                <!-- Filtros - Selectores para filtrar por diferentes criterios -->
                <div class="flex flex-wrap gap-4">
                    <!-- Selector de categorías -->
                    <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                        <option value="">Todas las categorías</option>
                        <option value="ferreteria">Ferretería</option>
                        <option value="electronica">Electrónica</option>
                        <option value="herramientas">Herramientas</option>
                    </select>
                    <!-- Selector de ordenamiento -->
                    <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                        <option value="">Ordenar por</option>
                        <option value="codigo">Código</option>
                        <option value="nombre">Nombre</option>
                    </select>
                    <!-- Selector de almacenes -->
                    <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                        <option value="">Todos los almacenes</option>
                        <option value="JW1">JW1</option>
                        <option value="JW2">JW2</option>
                        <option value="JW3">JW3</option>
                        <option value="JW4">JW4</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabla de Materiales - Listado principal con selección múltiple -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-20">
            <div class="overflow-x-auto">
                <!-- Tabla de materiales disponibles para surtir -->
                <table class="min-w-full divide-y divide-gray-200">
                    <!-- Encabezados de la tabla con fondo azul claro -->
                    <thead class="bg-[#e6ebfa]">
                        <tr>
                            <!-- Checkbox para seleccionar todos los materiales -->
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" 
                                    id="selectAll"
                                    class="rounded border-gray-300 text-[#2045c2] focus:ring-[#2045c2]"
                                    onchange="toggleAllCheckboxes(this)">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barcode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Almacén</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla con datos dinámicos -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Formulario para enviar los materiales seleccionados -->
                        <form action="{{route('Select_Material')}}" method="POST">
                            @csrf
                            
                            <!-- Iteración sobre los materiales disponibles -->
                            @foreach ($detalleInventario as $inventario )
                            
                            <tr class="hover:bg-gray-50">
                                <!-- Checkbox para seleccionar material individual -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" 
                                    name="detalleInventario[]" 
                                    value="{{$inventario->id}}"
                                    class="material-checkbox rounded border-gray-300 text-[#2045c2] focus:ring-[#2045c2]"
                                    onchange="updateSurtirButton()">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$inventario->material->codigo}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><img src="{{ route('barcode', ['numeroParte' => $inventario->material->codigo]) }}" alt="Código de Barras"
                                    style="width: 150px; height: 50px;"
                                    ></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->nombre}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->categoria}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->material->unidad_medida}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->estante->almacen}}</td>
                                <!-- Formato de ubicación: pasillo-columna-fila -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$inventario->estante->pasillo}}-{{$inventario->estante->columna}}-{{$inventario->estante->fila}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <!-- Botón para localizar material en el almacén -->
                                    <button 
                                    type="button" 
                                    class="px-3 py-1 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center gap-1"
                                    >
                                    <!-- Icono de ubicación -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    Localizar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Botón flotante para surtir materiales seleccionados -->
                <button type="submit"
                    id="surtirButton"
                    disabled
                    class="fixed bottom-8 right-8 px-6 py-3 text-base font-medium bg-gray-300 text-gray-600 rounded-lg hover:bg-gray-400 transition-colors duration-150 disabled:opacity-50 disabled:cursor-not-allowed enabled:bg-[#2045c2] enabled:text-white enabled:hover:bg-[#1a3aa3] enabled:shadow-md"
                >
                    Material de Surtir
                </button>
            </form>
            </div>
        </div>
    </div>

    <!-- De aqui es el codigo para el fondo de pantalla img pantalla completa -->
    <div id="background-overlay" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('img/surtir.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: -9999;
        pointer-events: none;
    "></div>

    <!-- Scripts para la funcionalidad de selección de materiales -->
    <script>
        // Función para seleccionar/deseleccionar todos los checkboxes
        function toggleAllCheckboxes(source) {
            const checkboxes = document.getElementsByClassName('material-checkbox');
            for (let checkbox of checkboxes) {
                checkbox.checked = source.checked;
            }
            updateSurtirButton();
        }

        // Función para actualizar el estado del botón de surtir
        function updateSurtirButton() {
            const checkboxes = document.getElementsByClassName('material-checkbox');
            const surtirButton = document.getElementById('surtirButton');
            let checkedCount = 0;
            
            // Contar cuántos materiales están seleccionados
            for (let checkbox of checkboxes) {
                if (checkbox.checked) checkedCount++;
            }
            
            // Habilitar/deshabilitar el botón según la selección
            surtirButton.disabled = checkedCount === 0;
            
            // Cambiar el estilo del botón cuando está habilitado
            if (checkedCount > 0) {
                surtirButton.classList.add('bg-[#2045c2]', 'text-white', 'hover:bg-[#1a3aa3]', 'shadow-md');
                surtirButton.classList.remove('bg-gray-300', 'text-gray-600', 'hover:bg-gray-400');
            } else {
                surtirButton.classList.remove('bg-[#2045c2]', 'text-white', 'hover:bg-[#1a3aa3]', 'shadow-md');
                surtirButton.classList.add('bg-gray-300', 'text-gray-600', 'hover:bg-gray-400');
            }
        }

        // Inicializar la interfaz cuando el DOM esté cargado
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('background-overlay');
            document.body.prepend(overlay);
            
            // fondo semitransparente
            const mainContainer = document.querySelector('.min-h-screen');
            if (mainContainer) {
                mainContainer.style.backgroundColor = 'rgba(19, 18, 18, 0.4)';
            }
            
            // Verificar el estado inicial de los checkboxes
            updateSurtirButton();
        });
    </script>
@endsection

