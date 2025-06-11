<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando...</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        h2 {
            color: #333;
        }
    </style>
    <script>
        // Redirigir a home después de un breve retraso para simular la carga
        window.onload = function() {
            setTimeout(function() {
                window.location.href = "{{ route('home') }}";
            }, 1000); // 1 segundo de retraso
        };
    </script>
</head>
<body>
    <div class="spinner"></div>
    <h2>Cargando su sesión...</h2>
</body>
</html>