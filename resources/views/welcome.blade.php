<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #003366, #0056b3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
            text-align: center;
        }
        .welcome-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 3rem 4rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
            backdrop-filter: blur(5px);
        }
        h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.4);
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .btn-login {
            background-color: #ffc107;
            color: #003366;
            font-weight: bold;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 1.3rem;
        }
        .btn-login:hover {
            background-color: #e0a800;
            transform: translateY(-3px);
            color: #003366;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Bienvenido a la Biblioteca del Colegio Marcelino Champagnat</h1>
        <p>Explora nuestra vasta colección de libros y recursos.</p>
        <a href="{{ route('login') }}" class="btn btn-login">Iniciar Sesión</a>
    </div>
</body>
</html>