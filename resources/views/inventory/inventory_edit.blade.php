@extends('layouts.app')

@section('content')
<!-- Gradiente de fondo - Agrega un efecto visual atractivo a la página -->
<div class="fixed top-0 left-0 w-full h-screen bg-gradient-to-br from-[#2045c2] via-[#5a8ff2] to-[#b3d1ff]"></div>

<div class="p-6">
    <!-- Header - Título y descripción de la página -->
    <div class="mb-6">
        <!-- Cambié foundit-blue por #2045c2 para mantener consistencia en la paleta de colores -->
        
        <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded">Editar Registro de Recibo/Entrada <p class="text-gray-600 mt-2 text-sm">Modifique los detalles del Recibo/Entrada</p></h1>
        
    </div>

    <!-- Formulario de Edición de Embarque - Contenedor principal del formulario -->
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 relative z-10">
        <form class="p-8">
            <!-- Campos agrupados con espaciado vertical uniforme -->
            <div class="space-y-6">
                <!-- Código del Material (No editable) - Campo de solo lectura -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Código del Material
                    </label>
                    <input 
                        type="text" 
                        value="EMB001"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        readonly
                    >
                    <!-- El atributo readonly impide la edición pero permite copiar el valor -->
                </div>

                <!-- Material - Campo editable para el nombre del material -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Material
                    </label>
                    <input 
                        type="text" 
                        value="Tornillos M4"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        required
                    >
                    <!-- El atributo required asegura que el campo no quede vacío -->
                </div>

                <!-- Categoría - Selector desplegable con opciones predefinidas -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Categoría
                    </label>
                    <select 
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        required
                    >
                        <!-- Opciones del selector con la opción actual preseleccionada -->
                        <option value="" disabled>Seleccione una categoría</option>
                        <option value="ferreteria" selected>Ferretería</option>
                        <option value="electronica">Electrónica</option>
                        <option value="herramientas">Herramientas</option>
                        
                    </select>
                </div>

                <!-- Cantidad - Campo numérico con valor mínimo -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Cantidad
                    </label>
                    <input 
                        type="number" 
                        value="1000"
                        class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                        min="1"
                        required
                    >
                    <!-- El atributo min="1" evita valores negativos o cero -->
                </div>

                <!-- Ubicación (Deshabilitada) - Campo informativo no editable -->
                <div>
                    <label class="block text-base font-medium text-gray-700 mb-2">
                        Ubicación
                    </label>
                    <input 
                        type="text" 
                        value="Pendiente de asignar en área de Almacen"
                        class="w-full h-12 text-lg rounded-lg bg-gray-50 border-gray-300 text-gray-500"
                        disabled
                    >
                    <!-- Texto explicativo para el usuario -->
                    <p class="mt-2 text-sm text-gray-500">La ubicación será asignada en el área de Almacen</p>
                </div>
            </div>

            <!-- Botones de Acción - Sección de controles del formulario -->
            <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <!-- Botón Cancelar - Regresa a la página anterior -->
                <button 
                    type="button"
                    onclick="history.back()" 
                    class="px-6 py-3 text-lg font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5]"
                >
                    Cancelar
                </button>
                <!-- Botón Guardar - Envía el formulario -->
                <button 
                    type="submit"
                    class="px-6 py-3 text-lg font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md"
                >
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script para ajustar el fondo y la visualización -->
<script>
    // Este script se ejecuta cuando el DOM está completamente cargado
    document.addEventListener('DOMContentLoaded', function() {
        // Ajusta el z-index para asegurar que el contenido esté por encima del gradiente
        const mainContent = document.querySelector('.p-6');
        if (mainContent) {
            mainContent.style.position = 'relative';
            mainContent.style.zIndex = '10';
        }
    });
</script>
@endsection

