<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategorías de {{ $category->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilo de las tarjetas de subcategorías */
        .card-subcategory {
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.4rem;
            font-weight: bold;
            text-align: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 15px; /* Bordes más redondeados */
            text-decoration: none;
            color: #333;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        /* Efecto hover */
        .card-subcategory:hover {
            transform: translateY(-10px); /* Elevar la tarjeta al pasar el cursor */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Sombra más intensa */
            background-color: #007bff; /* Cambiar fondo al hacer hover */
            color: white; /* Cambiar color de texto */
        }

        /* Asegurar que las tarjetas estén bien espaciadas */
        .row-subcategories {
            gap: 20px; /* Espacio entre las tarjetas */
        }

        /* Estilo del botón "Volver al Home" */
        .btn-home {
            background-color: #007bff;
            color: white;
            border-radius: 25px;
            font-weight: bold;
            padding: 12px 30px;
            text-align: center;
            margin-top: 30px;
            text-decoration: none;
        }

        .btn-home:hover {
            background-color: #0056b3;
            color: white;
        }

        /* Mejorar el estilo del título */
        h1 {
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Subcategorías de: {{ $category->name }}</h1>

        @if ($subcategories->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay subcategorías para esta categoría.
            </div>
        @else
            <div class="row row-subcategories">
                @foreach ($subcategories as $subcategory)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('subcategories.books', $subcategory->id) }}" class="card-subcategory d-block">
                            {{ $subcategory->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('home') }}" class="btn btn-home">Volver al Home</a>
    </div>
</body>
</html>
