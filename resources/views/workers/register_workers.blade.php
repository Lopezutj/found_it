@extends('layouts.app')

@section('content')
<!-- linea de gradiente  -->
<div class="fixed top-0 left-0 w-full h-screen bg-gradient-to-br from-[#2045c2] via-[#5a8ff2] to-[#b3d1ff]"></div>

<div class="min-h-screen flex items-center justify-center p-6">
  <!-- Formulario de Nuevo Empleado -->
  <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg border border-gray-200 relative z-10">
      <form action="#" method="post" class="p-8">
          @csrf
          <div class="space-y-6">
              <!-- Header -->
              <div class="text-center">
                  <h1 class="text-2xl font-semibold text-[#2045c2]">REGISTRAR NUEVO TRABAJADOR</h1>
                  <p class="text-gray-600 mt-1">Ingrese los detalles del nuevo trabajador</p>
              </div>

              <!-- Nombre -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Nombre
                  </label>
                  <input 
                      type="text" 
                      name="name"
                      placeholder="Ingrese el nombre completo"
                      class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                      required
                  >
              </div>

              <!-- Email -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Email
                  </label>
                  <input 
                      type="email" 
                      name="email"
                      placeholder="Ingrese el correo electrónico"
                      class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                      required
                  >
              </div>

              <!-- Contraseña -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Contraseña
                  </label>
                  <input 
                      type="text" 
                      name="password"
                      placeholder="Ingrese la contraseña"
                      class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                      required
                  >
              </div>

              <!-- Confirmar Contraseña -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Confirmar Contraseña
                  </label>
                  <input 
                      type="text" 
                      name="password_confirmation"
                      placeholder="Confirme la contraseña"
                      class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]"
                      required
                  >
              </div>

              <!-- Permisos de Administrador -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Permisos de Usuario
                  </label>
                  <select name="is_admin" class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]">
                      <option value="0">Trabajador</option>
                      <option value="1">Administrador</option>
                  </select>
              </div>

              <!-- Estatus -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Estatus
                  </label>
                  <div class="flex items-center space-x-4">
                      <label class="inline-flex items-center">
                          <input type="radio" name="status" value="active" class="h-5 w-5 text-[#2045c2] focus:ring-[#2045c2]" checked>
                          <span class="ml-2 text-gray-700">Activo</span>
                      </label>
                      <label class="inline-flex items-center">
                          <input type="radio" name="status" value="inactive" class="h-5 w-5 text-[#2045c2] focus:ring-[#2045c2]">
                          <span class="ml-2 text-gray-700">Inactivo</span>
                      </label>
                  </div>
              </div>
          </div>

          <!-- Botones de Acción -->
          <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
              <a 
                  href="../workers" 
                  class="px-6 py-3 text-lg font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5] flex items-center justify-center"
              >
                  Cancelar
              </a>
              <button 
                  type="button"
                  onclick="window.location.href='../workers'"
                  class="px-6 py-3 text-lg font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md"
              >
                  Guardar
              </button>
          </div>
      </form>
  </div>
</div>
@endsection

