@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-[#2045c2]">Gestión de Contenido</h1>
        </div>

        <!-- Búsqueda y Filtros -->
        <div class="mb-6 card">
            <div class="flex flex-col md:flex-row gap-4">
                <!-- Búsqueda -->
                <div class="flex-1">
                    <form action="{{route('SearchC')}}" method="GET">

                        <div class="relative flex">
                            <input 
                            type="text" 
                            id="searchInput"
                            name="busqueda"
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
                        type="submit"
                        class="h-10 px-4 bg-[#2045c2] text-white rounded-r-lg hover:bg-[#1a3aa3] shadow-md"
                        >
                        Buscar
                    </button>
                </div>
                </form>
                </div>

                <!-- Filtros -->
                <div class="flex flex-wrap gap-4">
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

        <!-- Materiales sin ubicación -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-[#ff3333] mb-4">Materiales sin ubicación</h2>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Material</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($materialsinUbicacion as  $material)
                            
                            <!-- Ejemplo de fila sin ubicación -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$material->codigo}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$material->nombre}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$material->categoria}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$material->unidad_medida}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">

                                    <form action="" class="inline">
                                        @csrf
                                        <button onclick="openHistoryModal('MAT002')" class="text-[#2045c2] hover:text-[#ff3333]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('Register_ubicacion', $material->id) }} " method="POST" class="inline">
                                        @csrf
                                        {{-- agregar ubicacion --}}
                                        <button type="submit" class="text-[#2045c2] hover:text-[#ff3333]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>

                    @if ($materialsinUbicacion->isEmpty())
                    <p class="p-4 text-gray-500">No hay materiales sin ubicación.</p>
                    @endif

                </div>
            </div>
        </div>

        <!-- Materiales con ubicación -->
        <div>
            <h2 class="text-xl font-semibold text-[#2045c2] mb-4">Materiales con ubicación</h2>
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
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
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Ejemplo de fila con ubicación -->
                            @foreach ($detalleInventario as $detalle)
                                
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$detalle->material->codigo}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><img src="{{ route('barcode', ['numeroParte' => $detalle->material->codigo]) }}" alt="Código de Barras"
                                    style="width: 150px; height: 50px;"
                                    ></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$detalle->material->nombre}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$detalle->material->categoria}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$detalle->material->unidad_medida}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$detalle->estante->almacen}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$detalle->estante->pasillo}}-{{$detalle->estante->columna}}-{{$detalle->estante->fila}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button onclick="openHistoryModal('MAT001')" class="text-[#2045c2] hover:text-[#ff3333]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                    <button onclick="openEditModal('MAT001')" class="text-[#2045c2] hover:text-[#ff3333]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($detalleInventario->isEmpty())
                    <p class="p-4 text-gray-500">No hay Inventario.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection