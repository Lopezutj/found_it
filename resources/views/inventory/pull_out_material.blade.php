@extends('layouts.app')

@section('content')
<!-- Gradiente de fondo - Proporciona un aspecto visual atractivo y profesional -->
<div class="fixed top-0 left-0 w-full h-screen bg-gradient-to-br from-[#2045c2] via-[#5a8ff2] to-[#b3d1ff]"></div>

<div class="p-6">
    <!-- Header - Título de la página -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded" title="Página para gestionar la salida de materiales del almacén">SURTIR MATERIAL</h1>
    </div>
    
    <!-- Formulario principal - Gestiona la salida de materiales -->
    <form action="{{route('Exist_Material')}}" method="POST" class="relative z-10">
        @csrf
        @method('PUT')
        <!-- Método PUT para actualizar registros existentes -->

        <!-- Contenedor con scroll horizontal - Permite visualizar múltiples materiales -->
        <div class="w-full overflow-x-auto pb-4" title="Deslice horizontalmente para ver todos los materiales disponibles">
            <!-- Materiales en fila horizontal - Muestra los materiales disponibles para surtir -->
            <div class="flex flex-nowrap gap-4 min-w-full">
                @foreach ( $selectMateriales as $detalle )
                
                <!-- Tarjeta de Material - Contiene información y controles para cada material -->
                <div class="flex-none w-[350px] bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md" title="Información detallada del material {{$detalle->material->nombre}}">
                    <!-- Información del material organizada en grid -->
                    <dl class="grid grid-cols-2 gap-4 mb-4">
                        <!-- Código del material -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Código único que identifica el material">Código</dt>
                            <dd class="text-lg font-medium text-gray-900">{{$detalle->material->codigo}}</dd>
                        </div>
                        <!-- Nombre del material -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Nombre descriptivo del material">Material</dt>
                            <dd class="text-lg text-gray-900">{{$detalle->material->nombre}}</dd>
                        </div>
                        <!-- Almacén donde se encuentra -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Identificador del almacén donde se encuentra el material">Almacén</dt>
                            <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded" title="Almacén {{$detalle->estante->almacen}}">{{$detalle->estante->almacen}}</dd>
                        </div>
                        <!-- Pasillo donde se encuentra -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Número de pasillo donde se encuentra el material">Pasillo</dt>
                            <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded" title="Pasillo {{$detalle->estante->pasillo}}">{{$detalle->estante->pasillo}}</dd>
                        </div>
                        <!-- Ubicación específica (columna-fila) -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Posición exacta dentro del pasillo (columna y fila)">Ubicación</dt>
                            <dd class="text-lg text-gray-900 bg-[#e6ebfa] px-2 py-1 rounded" title="Columna {{$detalle->estante->columna}}, Fila {{$detalle->estante->fila}}">{{$detalle->estante->columna}}-{{$detalle->estante->fila}}</dd>
                        </div>
                        <!-- Cantidad disponible -->
                        <div>
                            <dt class="text-sm font-medium text-gray-500" title="Cantidad total disponible en inventario">Disponible</dt>
                            <dd class="text-lg font-semibold text-[#2045c2]" title="{{$detalle->material->unidad_medida}} unidades disponibles">{{$detalle->material->unidad_medida}}</dd>
                        </div>
                    </dl>
                    
                    <!-- Controles para surtir material -->
                    <div class="flex flex-col space-y-3">
                        <!-- Selector de cantidad a surtir -->
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium text-gray-700" title="Indique cuántas unidades desea retirar del almacén">
                                Unidades a surtir:
                            </label>
                            <div class="flex items-center">
                                <!-- Campo oculto para ID del material -->
                                <input 
                                    type="hidden" name="materiales[{{ $detalle->material->id }}][id]" value="{{ $detalle->material->id }}">
                                <!-- Campo para ingresar cantidad a surtir -->
                                <input 
                                type="number" 
                                name="materiales[{{$detalle->material->id}}][surtir]"
                                class="w-20 h-10 text-center rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                placeholder="0"
                                min="1"
                                max="{{$detalle->material->unidad_medida}}"
                                value="{{ old('materiales.'.$detalle->material->id.'.surtir',0)}}"
                                title="Ingrese un valor entre 1 y {{$detalle->material->unidad_medida}}"
                                >
                                <span class="ml-2 text-sm text-gray-500">unidades</span>
                            </div>
                        </div>
                        
                        <!-- Botón para localizar el material en el almacén -->
                        <button 
                            type="button" 
                            class="w-full px-3 py-2 text-sm font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md flex items-center justify-center gap-1"
                            title="Muestra la ubicación exacta del material en el almacén"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            Localizar
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Botones de acción - Controles principales del formulario -->
        <div class="flex justify-end gap-4 mt-8">
            <!-- Botón Cancelar - Regresa a la página anterior -->
            <button 
                type="button"
                onclick="history.back()" 
                class="px-6 py-2 text-base font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5] w-[180px]"
                title="Cancelar la operación y volver a la página anterior"
            >
                Cancelar
            </button>
            <!-- Botón Confirmar - Envía el formulario para procesar la salida -->
            <button 
                type="submit"
                class="px-6 py-2 text-base font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md w-[180px]"
                title="Confirmar la salida de los materiales con las cantidades especificadas"
            >
                Confirmar salida
            </button>
        </div>
    </form>
</div>

<!-- Script para ajustar el fondo y la visualización -->
<script>
    // Este script mejora la visualización y experiencia del usuario
    document.addEventListener('DOMContentLoaded', function() {
        // Asegura que el contenido principal esté por encima del gradiente
        const mainContent = document.querySelector('.p-6');
        if (mainContent) {
            mainContent.style.position = 'relative';
            mainContent.style.zIndex = '10';
        }
        
        // Añade efecto de hover a las tarjetas de materiales
        const materialCards = document.querySelectorAll('.flex-none');
        materialCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('shadow-md');
                this.style.transform = 'translateY(-2px)';
                this.style.transition = 'all 0.2s ease';
            });
            card.addEventListener('mouseleave', function() {
                this.classList.remove('shadow-md');
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endsection