@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-90 px-6 py-3 rounded-lg shadow-md">PANEL DE CONTROL</h1>
    </div>

        <div>
            <iframe src="http://192.168.1.200/" width="100%" height="600px" style="border: none;"></iframe>
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
    background-image: url('{{ asset('img/dash.jpg') }}');
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
        
        // Añade efecto de hover a las filas de las tablas
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.classList.add('bg-gray-50');
            });
            row.addEventListener('mouseleave', function() {
                this.classList.remove('bg-gray-50');
            });
        });
    });
</script>
@endsection

