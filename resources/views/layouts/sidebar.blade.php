<div class="sidebar fixed inset-y-0 left-0 w-64 transform -translate-x-full lg:translate-x-0 transition duration-200 ease-in-out z-30" style="background-color: #2045c2;">

<!-- Company Logo and Name - Vertical Layout -->
<div class="flex flex-col items-center pt-4 pb-4 border-b border-white/10">
    <img src="{{ asset('img/logofound-it.jpg') }}" alt="Logo de Found-It" class="w-48 h-16 mx-auto">
</div>

    <!-- Sidebar Navigation -->
    <nav class="mt-5 px-3 overflow-y-auto h-[calc(100vh-4rem-4rem)]">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{route('dashboard')}}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-white text-foundit-blue hover:bg-opacity-90 transition-all duration-150 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <!-- Área -->
            <div class="mb-1">
                <button class="collapsible-trigger w-full flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white hover:bg-white/10 transition-all duration-150 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                    </svg>
                    Área
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-4 w-4 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="collapsible-content overflow-hidden max-h-0 transition-all duration-200 ease-in-out">
                    <div class="py-2 space-y-1">
                        <a href="{{route('StockSurtido')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                            Surtido
                        </a>
                        <a href="{{route('Inventorystock')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                            Almacen
                        </a>
                        <a href="{{route('Stock')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                            Recibo/Entrada
                        </a>
                    </div>
                </div>
            </div>

            <!-- Productos -->
            <div class="mb-1">
                <button class="collapsible-trigger w-full flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white hover:bg-white/10 transition-all duration-150 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                    Productos
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto h-4 w-4 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="collapsible-content overflow-hidden max-h-0 transition-all duration-200 ease-in-out">
                    <div class="py-2 space-y-1">
                        <a href="{{route('critical_Products')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                        Bajo Inventario
                        </a>
                        <a href="{{route('total_Products')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                            Materiales Totales
                        </a>
                        <a href="{{route('expensive_products')}}" class="flex items-center px-11 py-2 text-sm font-medium text-white hover:bg-white/10 rounded-lg transition-all duration-150">
                            Materiales Alto Valor
                        </a>
                    </div>
                </div>
            </div>

            <!-- Reportes -->
            <a href="/reportes" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white hover:bg-white/10 transition-all duration-150 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2-2h-2a2 2 0 01-2-2z" />
                </svg>
                Reportes
            </a>

            <!-- Trabajadores -->
            <a href="{{route('workers')}}" class="flex items-center px-4 py-3 text-sm font-medium rounded-lg bg-white text-foundit-blue hover:bg-opacity-90 transition-all duration-150 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Trabajadores
            </a>
        </div>
    </nav>

    <!-- User Profile -->
    <div class="absolute bottom-0 w-full border-t border-white/10 bg-white/5">
        <div class="flex items-center p-4">
            <div class="flex-shrink-0">
                <a title="Ver perfil" href="{{route('user.profile')}}">
                    <div class="h-10 w-10 rounded-lg bg-white flex items-center justify-center text-foundit-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </a>
            </div>
            <!--DATA User -->
            <div class="ml-1 flex flex-col max-w-[150px]">
                <div class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</div>
                <div class="text-xs text-white/70 truncate">{{ auth()->user()->email }}</div>
            </div>
            <!-- exist login -->
            <form action="{{route('logout_user')}}" method="POST" class="ml-auto">
                @csrf
                <button type="submit" class="p-1 rounded-lg text-white hover:bg-white/10 transition-all duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
