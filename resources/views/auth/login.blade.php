<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/almacen2.jpg') }}');">

    <main class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-75 rounded-lg shadow-lg overflow-hidden"> <!-- CONTENDEDOR DEL LOGIN -->
            <div class="bg-blue-500 text-white p-6">
                <div class="text-center">
                    <h3 class="text-3xl font-semibold mb-2">Bienvenido al sistema Found It!</h3>
                    <p>EL Slogan</p>
                </div>
            </div>

            <div class="p-6 bg-white">
                <form action="{{route('login_user')}}" method="post" class="space-y-4" > {{-- Vista funcional --}}
                    @csrf
                    <h2 class="text-2xl font-semibold mb-4 text-center">Inicio de Sesión</h2>
                    <input type="text" name="email" placeholder="Usuario" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="password" name="password" placeholder="Contraseña" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <button type="submit" value="Inciar_sesion" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Ingresar</button>
                </form>

                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">¿No tienes cuenta? <a href="{{route('registrarUsuario')}}" class="text-blue-500 hover:text-blue-700">Regístrate aquí</a></p>
                </div>

            </div>

        </div><!-- cierre de caja del login -->
        @if (isset($mensaje))
        <script>
            alert('{{$mensaje}}');
        </script>
        
        @endif
    </main>

</body>
</html>
