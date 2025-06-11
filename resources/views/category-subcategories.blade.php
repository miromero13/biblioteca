<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategorías de {{ $category->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .card-subcategory {
            height: 150px; /* Altura fija para las tarjetas de subcategoría */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .card-subcategory:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Subcategorías de: {{ $category->name }}</h1>

        @if ($subcategories->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay subcategorías para esta categoría.
            </div>
        @else
            <div class="row">
                @foreach ($subcategories as $subcategory)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('subcategories.books', $subcategory->id) }}" class="card-subcategory d-block">
                            {{ $subcategory->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        <a href="{{ route('home') }}" class="btn btn-secondary mt-4">Volver al Home</a>
    </div>
</body>
</html>