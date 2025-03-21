<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animaciones para efectos de entrada */
        @keyframes slideIn {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .slide-in {
            animation: slideIn 1s ease-out;
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        /* Fondo con gradiente animado */
        .tech-background {
            background: linear-gradient(45deg, #1e3a8a, #2563eb);
            background-size: 400% 400%;
            animation: gradientAnimation 5s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen bg-cover bg-center tech-background" style="background-image: url('{{ asset('img/almacen2.jpg') }}');">

    <main class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-90 rounded-lg shadow-2xl overflow-hidden transform transition-all duration-1000 scale-95 hover:scale-100 slide-in"> <!-- CONTENDEDOR DEL LOGIN -->
            <div class="bg-blue-500 text-white p-8">
                <div class="text-center fade-in">
                    <h3 class="text-4xl font-bold mb-3">Bienvenido al sistema Found It!</h3>
                    <p class="italic text-lg">Encuentra lo que necesitas con facilidad</p>
                </div>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">¡Error!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="p-8 bg-white rounded-b-lg shadow-lg">
                <form action="{{route('login_user')}}" method="post" class="space-y-6"> {{-- Vista funcional --}}
                    @csrf
                    <h2 class="text-2xl font-semibold text-center text-blue-500 fade-in">Inicio de Sesión</h2>
                    <input type="text" name="email" placeholder="Usuario" value="{{old('email')}}" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 hover:shadow-xl hover:border-blue-400"/>
                    @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <input type="password" name="password" placeholder="Contraseña" class="w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 hover:shadow-xl hover:border-blue-400"/>
                    @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    <button type="submit" value="Inciar_sesion" class="w-full bg-blue-500 text-white py-3 rounded-xl text-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105 hover:shadow-2xl">Ingresar</button>
                </form>
            </div>
        </div><!-- cierre de caja del login -->
    </main>

</body>
</html>
