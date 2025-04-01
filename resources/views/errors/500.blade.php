<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500 - Error del Servidor</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .monkey {
            width: 150px;
            animation: shake 0.5s infinite alternate;
            border-radius: 50%;
            background: white;
            padding: 10px;
        }
        @keyframes shake {
            0% { transform: translateX(-5px); }
            100% { transform: translateX(5px); }
        }
        .message {
            font-size: 24px;
            margin-top: 20px;
            color: #ffffff;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff9900;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #e68a00;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Bananas_foster_monkey.png" alt="Mono confundido" class="monkey">
        <div class="message">Oops! Algo salió mal en el servidor.</div>
        <a href="/" class="btn">Volver a Inicio</a>
    </div>
</body>
</html>
