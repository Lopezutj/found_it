<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/almacen2.jpg') }}');">

    <main class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-75 rounded-lg shadow-lg overflow-hidden"> <!-- CONTENDEDOR DEL REGISTRO -->
            <div class="bg-blue-500 text-white p-6">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold mb-2">Bienvenido al sistema Found It!</h3>
                    <p>Registrate para continuar.</p>
                </div>
            </div>

            <div class="p-6 bg-white">
                <form action="{{route('Register_user')}}" method="post" class="space-y-4"> {{-- Vista funcional --}}
                    @csrf
                    <h2 class="text-2xl font-semibold mb-4 text-center">Registro de Usuario</h2>
                    <input type="text" name="name" placeholder="Nombre Completo" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <input type="email" name="email" placeholder="Correo Electrónico" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <input type="password" name="password" placeholder="Contraseña" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" />
                    
                    <!-- Menú para seleccionar el rol -->
                    <div class="w-full">
                        <label for="role" class="block text-gray-700">Selecciona un rol:</label>
                        <select name="rol" id="role" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="adm">Administrador</option>
                            <option value="oper">Operador</option>
                        </select>
                    </div>

                    <button type="submit" value="Registrar" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Registrar</button>
                </form>
            </div>

        </div><!-- cierre de caja del registro -->
    </main>

</body>
</html>
