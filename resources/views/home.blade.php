<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilo del carrusel */
        .category-carousel .carousel-item img {
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Estilo para el header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #003366;
            padding: 15px 30px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .logo {
            width: 60px;
            height: 60px;
            background-color: white;
            color: #003366;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            border-radius: 8px;
        }

        .school-name {
            color: white;
            font-weight: bold;
            font-size: 20px;
            margin-left: 15px;
        }

        .header .d-flex {
            display: flex;
            align-items: center;
        }

        .header button {
            font-weight: bold;
            padding: 10px 20px;
            margin-left: 10px;
        }

        .header .logout-btn {
            font-size: 16px;
            background-color: transparent;
            border: none;
            color: white;
        }

        .logout-btn:hover {
            color: #ff6666;
        }

        .header .logout-btn i {
            font-size: 20px;
        }

        /* Espaciado para el contenido debajo del header */
        .content {
            margin-top: 100px;
        }

        /* Carrusel de categorías */
        .carousel-caption h5 {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }

        .carousel-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel-item img {
            width: 100%;
            max-width: 100%;
        }

        /* Estilo de las tarjetas de estadísticas */
        .card {
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #003366;
        }

        .card-text {
            font-size: 22px;
            font-weight: bold;
            color: #0056b3;
        }

        .card-body {
            padding: 20px;
        }

        /* Espaciado y estilo de los encabezados */
        h1, h3 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            color: #003366;
        }

        h1 {
            font-size: 36px;
        }

        h3 {
            font-size: 24px;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="d-flex">
            <div class="logo">M</div>
            <div class="school-name">Colegio Marcelino Champagnat</div>
        </div>
        <div class="d-flex">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Agregar Libro</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Agregar Categoría</button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="container content">
        <!-- Título principal -->
        <h1 class="text-center mb-4">Bienvenido, {{ auth()->user()->name }}</h1>
        
        <!-- Estadísticas -->
        <div class="row mt-4">
            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total de Libros</h5>
                        <p class="card-text">{{ $totalBooks }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total de Categorías</h5>
                        <p class="card-text">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Resultados de búsqueda</h5>
                        <p class="card-text">{{ count($books) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrusel de Categorías -->
        <div id="categoryCarousel" class="carousel slide category-carousel mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Agrupamos tres elementos en cada item del carrusel -->
                @foreach ($categories->chunk(3) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $category)
                                <div class="col-12 col-md-4">
                                    <a href="{{ route('books.category', $category->id) }}">
                                        <img src="{{ $category->image }}" class="d-block w-100" alt="{{ $category->name }}">
                                        <!-- <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $category->name }}</h5>
                                        </div> -->
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Tabla de Libros -->
        <div class="mt-5">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th>Año</th>
                        <th>Categoría</th>
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
                            <td>{{ $book->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para Agregar Libro -->
    <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookModalLabel">Agregar Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Código</label>
                            <input type="text" class="form-control" name="code" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="author" class="form-label">Autor</label>
                            <input type="text" class="form-control" name="author" required>
                        </div>
                        <div class="mb-3">
                            <label for="editorial" class="form-label">Editorial</label>
                            <input type="text" class="form-control" name="editorial" required>
                        </div>
                        <div class="mb-3">
                            <label for="year" class="form-label">Año</label>
                            <input type="number" class="form-control" name="year" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categoría</label>
                            <select class="form-control" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Libro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Agregar Categoría -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Agregar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Categoría</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">URL de la Imagen</label>
                            <input type="text" class="form-control" name="image" placeholder="Pega la URL de la imagen" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Categoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
