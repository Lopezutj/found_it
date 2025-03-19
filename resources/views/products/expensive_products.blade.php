@extends('layouts.app')

@section('content')
<div class="p-6">
    
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-[#2045c2]">MATERIALES ALTO VALOR</h1>
        
    </div>

    <!-- Barra de búsqueda y filtros -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <div class="relative flex">
                    <input 
                        type="text" 
                        placeholder="Buscar por código o nombre..."
                        class="w-full h-10 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
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
                    <button 
                        type="button"
                        class="h-10 px-4 bg-[#2045c2] text-white rounded-r-lg hover:bg-[#1a3aa3] shadow-md"
                    >
                        Buscar
                    </button>
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2] min-w-[180px]">
                <option value="">Todas las categorías</option>
                    <option value="electronica">Electrónica</option>
                    <option value="ferreteria">Ferretería</option>
                    <option value="herramientas">Herramientas</option>
                </select>
                <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2] min-w-[180px]">
                    <option value="">Ordenar por</option>
                    <option value="codigo">Código</option>
                    <option value="nombre">Nombre</option>
                    <option value="stock">Stock</option>
                </select>
                <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2] min-w-[180px]">
                    <option value="">Todos los almacenes</option>
                    <option value="JW1">JW1</option>
                    <option value="JW2">JW2</option>
                    <option value="JW3">JW3</option>
                    <option value="JW4">JW4</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Tabla de materiales -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#e6ebfa]">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Almacén</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT010</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Microcontrolador ARM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Electronica</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">JW2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">D-01-01</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button 
                                type="button" 
                                onclick="openHistoryModal('MAT010')"
                                class="text-[#2045c2] hover:text-[#1a3aa3] transition-colors duration-150"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                           
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT011</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sensor de Presión Industrial</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Electronica</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">JW1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">D-01-02</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button 
                                type="button" 
                                onclick="openHistoryModal('MAT011')"
                                class="text-[#2045c2] hover:text-[#1a3aa3] transition-colors duration-150"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                           
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">MAT015</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Circuito Integrado Especializado</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Electronica</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">JW3</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">E-02-03</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button 
                                type="button" 
                                onclick="openHistoryModal('MAT015')"
                                class="text-[#2045c2] hover:text-[#1a3aa3] transition-colors duration-150"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Incluir el modal de movimientos -->
@include('layouts.movements_modal')

<script>
    // Alias para mantener compatibilidad con el código anterior
    function openHistoryModal(code) {
        openMovementsModal(code);
    }
</script>
@endsection