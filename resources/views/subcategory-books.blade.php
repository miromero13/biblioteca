<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros de {{ $subcategory->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            /* background-color: #f4f7fa; */
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 40px;
        }

        /* Estilo del formulario de búsqueda */
        .input-group {
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .input-group input {
            border-radius: 30px 0 0 30px;
            padding-left: 20px;
            font-size: 1.1rem;
        }

        .input-group button {
            border-radius: 0 30px 30px 0;
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
        }

        .input-group button:hover {
            background-color: #0056b3;
        }

        /* Estilo de la tabla */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 12px 15px;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-striped tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Estilo para el alert de "No hay libros" */
        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border-radius: 10px;
            padding: 20px;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        /* Botón "Volver a Subcategorías" */
        .btn-secondary {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            margin-top: 40px;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Libros en la subcategoría: {{ $subcategory->name }}</h1>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('subcategories.books', $subcategory->id) }}" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Buscar libro..." value="{{ $searchTerm }}">
                <button class="btn" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
            </div>
        </form>

        @if ($books->isEmpty())
            <div class="alert alert-warning" role="alert">
                No hay libros en esta subcategoría.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Año</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->code }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->editorial }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <a href="{{ route('categories.subcategories', $subcategory->category_id) }}" class="btn btn-secondary mt-4">Volver a Subcategorías</a>
    </div>
</body>
</html>
