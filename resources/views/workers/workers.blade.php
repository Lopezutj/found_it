@extends('layouts.app')

@section('content')
  <div class="p-6">
      <!-- Header -->
      <div class="mb-6">
          <h1 class="text-2xl font-semibold text-[#2045c2] inline-block bg-white bg-opacity-40 px-4 py-2 rounded">TRABAJADORES</h1>
      </div>

      <!-- Sección de Búsqueda y Filtros -->
      <div class="mb-6 bg-white rounded-lg shadow-sm border border-gray-200 p-4">
          <div class="flex flex-col md:flex-row gap-4">
              <div class="flex-1">
                  <h2 class="text-xl font-semibold text-[#2045c2] mb-4">GESTION TRABAJADORES</h2>
                  <div class="flex gap-4 flex-col md:flex-row">
                      <!-- Búsqueda -->
                      <div class="flex-1">
                          <form action="#" method="GET">
                              <div class="relative flex">
                                  <input
                                      type="text"
                                      id="searchInput"
                                      name="busqueda"
                                      class="w-full h-10 pl-10 pr-4 rounded-l-lg border border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                                      placeholder="Buscar por nombre o email..."
                                      title="Ingrese el nombre o correo del trabajador que desea encontrar"
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
                                  <button class="h-10 px-4 bg-[#2045c2] text-white rounded-r-lg hover:bg-[#1a3aa3] shadow-md transition-colors duration-150" title="Iniciar búsqueda con los criterios ingresados">
                                      Buscar
                                  </button>
                              </div>
                          </form>
                      </div>

                      <!-- Filtros -->
                      <div class="flex gap-4 md:w-auto">
                          <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]" title="Filtrar trabajadores por su estado actual">
                              <option value="">Todos los estados</option>
                              <option value="activo">Activo</option>
                              <option value="inactivo">Inactivo</option>
                          </select>
                          <select class="h-10 rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]" title="Cambiar el orden de visualización de los trabajadores">
                              <option value="">Ordenar por</option>
                              <option value="nombre">Nombre</option>
                              <option value="email">Email</option>
                              <option value="fecha">Fecha de registro</option>
                          </select>
                      </div>

                      <!-- Botón Nuevo Empleado -->
                      <a href="{{ route('register_workers') }}" class="h-10 px-6 bg-[#2045c2] text-white rounded-lg hover:bg-[#1a3aa3] shadow-md transition-colors duration-150 flex items-center justify-center" title="Registrar un nuevo trabajador en el sistema">
                          Nuevo Empleado
                      </a>
                  </div>
              </div>
          </div>
      </div>

      <!-- Tabla de Empleados -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-200">
          <!-- El contenido de la tabla -->
          <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-[#e6ebfa]">
                      <tr>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Nombre completo del trabajador">Nombre</th>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Correo electrónico del trabajador">Email</th>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Indica si el trabajador tiene permisos de administrador">Admin</th>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Estado actual del trabajador en el sistema">Estatus</th>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Fecha en que el trabajador fue registrado en el sistema">Fecha de Registro</th>
                          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" title="Opciones para gestionar el trabajador">Acciones</th>
                      </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">

                      @foreach ($users as $usuarios)

                      <tr class="hover:bg-gray-50">
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$usuarios->name}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$usuarios->email}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                @switch($usuarios->rol)
                            @case('adm')
                                Administrador
                                @break
                            @case('oper')
                                Operador
                                @break
                            @default
                                {{ $usuarios->rol }}
                        @endswitch
                              </span>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                @switch($usuarios->activo)
                            @case('1')
                                Activo
                                @break
                            @case('0')
                                Inactivo
                                @break
                            @default
                                {{ $usuarios->rol }}
                        @endswitch

                              </span>
                         </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$usuarios->created_at}}</td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                              <a href="/editworkers" class="text-[#2045c2] hover:text-[#ff3333] transition-colors duration-150 inline-block" title="Editar información del trabajador">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="stroke: currentColor;">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                  </svg>
                              </a>
                              <a href="/UsuarioEliminado/{{$usuarios->id}}"
                                class="text-[#ff3333] hover:text-[#cc0000] transition-colors duration-150 inline-block"
                                onclick="return confirm('¿Está seguro que desea eliminar este empleado?')"
                                title="Eliminar trabajador del sistema">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                 </svg>
                             </a>
                          </td>
                      </tr>
                      @endforeach

              </table>
            </tbody>
            @if($users->isEmpty())
            <p class="p-4 text-gray-500">No hay usuarios registrados.</p>
            @endif
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
      background-image: url('{{ asset('img/workers_bg.jpg') }}');
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
