<!-- Modal de Movimientos -->
<div id="movementsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[80vh] flex flex-col">
        <!-- Modal Header -->
        <div class="bg-foundit-blue text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
            <h3 class="text-xl font-semibold" id="modalTitle">Historial de Movimientos</h3>
            <button onclick="closeMovementsModal()" class="text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="p-6 overflow-y-auto flex-grow">
            <div class="mb-4">
                <div class="flex items-center mb-2">
                    <span class="font-semibold text-gray-700 w-24">Código:</span>
                    <span id="modalCode" class="text-gray-900"></span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="font-semibold text-gray-700 w-24">Material:</span>
                    <span id="modalMaterial" class="text-gray-900"></span>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-4">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Movimientos Recientes</h4>
                <div id="movementsList" class="space-y-4">
                   
                </div>
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="bg-gray-50 px-6 py-4 rounded-b-lg flex justify-end">
            <button 
                onclick="closeMovementsModal()" 
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-150"
            >
                Cerrar
            </button>
        </div>
    </div>
</div>

<!-- Script para el modal (incluido directamente) -->
<script>
    // Datos estáticos para los materiales
    const materialsData = {
        
    };

    // Datos estáticos para los movimientos
    const movementsData = [
        {
            type: 'salida',
            date: '15/03/2025 - 10:30',
            quantity: 50,
            user: 'Juan Pérez',
    
        },
        {
            type: 'entrada',
            date: '10/03/2025 - 14:15',
            quantity: 200,
            user: 'María González',
    
        },
        {
            type: 'salida',
            date: '05/03/2025 - 09:45',
            quantity: 100,
            user: 'Carlos Rodríguez',
    
        }
    ];

    // Función para abrir el modal
    function openMovementsModal(code) {
        // Obtener datos del material
        const material = materialsData[code] || { name: 'Desconocido' };
        
        // Actualizar la información del modal
        document.getElementById('modalCode').textContent = code;
        document.getElementById('modalMaterial').textContent = material.name;

        // Limpiar y actualizar la lista de movimientos
        const movementsList = document.getElementById('movementsList');
        movementsList.innerHTML = '';
        
        // Agregar los movimientos al modal
        movementsData.forEach(movement => {
            const isEntry = movement.type === 'entrada';
            const badgeClass = isEntry ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
            const quantity = isEntry ? `+${movement.quantity}` : `-${movement.quantity}`;
            
            const movementHTML = `
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="font-medium text-gray-900">${isEntry ? 'Entrada' : 'Salida'} de Material</div>
                            <div class="text-sm text-gray-500">${movement.date}</div>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full ${badgeClass}">
                            ${quantity} unidades
                        </span>
                    </div>
                    <div class="mt-2 text-sm text-gray-600">
                        <span class="font-medium">Usuario:</span> ${movement.user}
                    </div>
                </div>
            `;
            
            movementsList.innerHTML += movementHTML;
        });

        // Mostrar el modal
        document.getElementById('movementsModal').classList.remove('hidden');
    }

    // Función para cerrar el modal
    function closeMovementsModal() {
        document.getElementById('movementsModal').classList.add('hidden');
    }

    // Cerrar el modal al hacer clic fuera de él
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('movementsModal');
        if (modal && event.target === modal) {
            closeMovementsModal();
        }
    });
</script>
