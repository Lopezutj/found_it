<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animaciones */
        @keyframes slideIn {
            0% { transform: translateY(-100%); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .slide-in { animation: slideIn 1s ease-out; }
        .fade-in { animation: fadeIn 1s ease-out; }

        /* Fondo con imagen */
        body {
            background: url('{{ asset('img/almacen2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        /* Estilos de la alerta */
        .alerta {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #f8fafc;
            border: 2px solid #f87171;
            color: #991b1b;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000;
            max-width: 400px;
        }
        .alerta h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #b91c1c;
        }
        .alerta button {
            background: #dc2626;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        .alerta button:hover {
            background: #b91c1c;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <main class="w-full h-full flex items-center justify-center">
        <div class="w-full max-w-md bg-white bg-opacity-90 rounded-lg shadow-2xl overflow-hidden transform transition-all duration-1000 scale-95 hover:scale-100 slide-in">
            <div class="bg-blue-500 text-white p-8">
                <div class="text-center fade-in">
                    <h3 class="text-4xl font-bold mb-3">Bienvenido al sistema Found It!</h3>
                    <p class="italic text-lg">Encuentra lo que necesitas con facilidad</p>
                </div>
            </div>

            @if ($errors->any())
                <div id="alerta-error" class="alerta fade-in">
                    <h2>¡Atención!</h2>
                    
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600">- {{ $error }}</li>
                        @endforeach
                    </ul>
                    <button onclick="document.getElementById('alerta-error').style.display='none'">Entendido</button>
                </div>
            @endif

            <div class="p-8 bg-white rounded-b-lg shadow-lg">
                <form action="{{route('login_user')}}" method="post" class="space-y-6">
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
                    <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-xl text-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105 hover:shadow-2xl">Ingresar</button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>
