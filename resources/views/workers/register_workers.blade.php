@extends('layouts.app')

@section('content')
<!-- linea de gradiente  -->
<div class="fixed top-0 left-0 w-full h-screen bg-gradient-to-br from-[#2045c2] via-[#5a8ff2] to-[#b3d1ff]"></div>

<div class="min-h-screen flex items-center justify-center p-6">
  <!-- Formulario de Nuevo Empleado -->
  <div class="max-w-4xl w-full bg-white rounded-lg shadow-lg border border-gray-200 relative z-10">
      <form action="{{route('Register_user')}}" method="post" class="p-8">
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
                      title="Ingrese el nombre completo del trabajador"
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
                      title="Ingrese un correo electrónico válido para el trabajador"
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
                      title="Ingrese una contraseña segura para el trabajador"
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
                      title="Repita la contraseña para confirmar que coincide"
                  >
              </div>

              <!-- Permisos de Administrador -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Permisos de Usuario
                  </label>
                  <select name="rol" class="w-full h-12 text-lg rounded-lg border-gray-300 focus:border-[#2045c2] focus:ring-[#2045c2]" title="Seleccione el nivel de permisos que tendrá el trabajador">
                      <option value="oper" title="Acceso limitado a funciones operativas">Operador</option>
                      <option value="adm" title="Acceso completo a todas las funciones del sistema">Administrador</option>
                  </select>
              </div>

              <!-- Estatus -->
              <div>
                  <label class="block text-base font-medium text-gray-700 mb-2">
                      Estatus
                  </label>
                  <div class="flex items-center space-x-4">
                      <label class="inline-flex items-center" title="El trabajador podrá acceder al sistema">
                          <input type="radio" name="status" value="active" class="h-5 w-5 text-[#2045c2] focus:ring-[#2045c2]" checked>
                          <span class="ml-2 text-gray-700">Activo</span>
                      </label>
                  </div>
              </div>
          </div>

          <!-- Botones de Acción -->
          <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
              <a
                  href="../workers"
                  class="px-6 py-3 text-lg font-medium text-[#ff3333] bg-[#fff5f5] border border-[#ff3333] rounded-lg hover:bg-[#ffe5e5] flex items-center justify-center"
                  title="Cancelar el registro y volver a la lista de trabajadores"
              >
                  Cancelar
              </a>
              <button
                  type="submit"
                  class="px-6 py-3 text-lg font-medium text-white bg-[#2045c2] rounded-lg hover:bg-[#1a3aa3] shadow-md"
                  title="Guardar la información del nuevo trabajador"
              >
                  Guardar
              </button>
          </div>
      </form>
  </div>
</div>
@endsection