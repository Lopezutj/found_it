<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Found IT Software') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('img/almacen2.jpg') }}');">
    <div class="min-h-screen bg-white bg-opacity-90">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Wrapper -->
        <div class="lg:pl-64 flex flex-col min-h-screen">
            <!-- Botón toggle para móvil (mantenido pero sin la barra blanca) -->
            <div class="h-16 flex items-center px-4 sm:px-6 lg:px-8 lg:hidden">
                <button id="sidebarToggle" class="text-foundit-blue hover:text-foundit-red">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Main Content -->
            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('-translate-x-full');
        });

        // Collapsible menu functionality
        document.querySelectorAll('.collapsible-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.transform');
                
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.classList.add('rotate-180');
                }
            });
        });
    </script>
</body>
</html>