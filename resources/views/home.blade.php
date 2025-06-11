<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Estilo del carrusel */
        .category-carousel .carousel-item img {
            /* Ajustamos la altura para que ocupe más espacio y sea responsive */
            height: 400px; /* Altura fija para todas las imágenes del carrusel */
            object-fit: cover; /* Asegura que la imagen cubra el área sin distorsionarse */
            width: 100%; /* Asegura que la imagen ocupe el 100% del ancho */
            display: block; /* Asegura que la imagen sea un bloque y ocupe todo el contenedor */
            border-radius: 0; /* Quitamos el border-radius para un aspecto más amplio */
        }

        /* Estilo de las imágenes dentro del carrusel */
        .carousel-item {
            position: relative; /* Asegura que cada elemento se posicione correctamente */
        }

        .carousel-item.active {
            display: block; /* Asegura que solo un carrusel item esté visible */
        }

        /* Agregar espacio para las leyendas del carrusel */
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5); /* Fondo oscuro para mejor visibilidad */
            border-radius: 5px;
        }

        /* Asegurando que el carrusel ocupe el 100% de su contenedor */
        .carousel-inner {
            overflow: hidden; /* Ocultar contenido fuera de los límites del carrusel */
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
            font-size: 2.5rem; /* Ajustar el tamaño del texto para que se vea bien */
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

    <div class="header">
        <div class="d-flex">
            <div class="logo">M</div>
            <div class="school-name">Colegio Marcelino Champagnat</div>
        </div>
        <div class="d-flex">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">Agregar Libro</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Agregar Categoría</button>
            <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#addSubcategoryModal">Agregar Subcategoría</button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    <div class="container content">
        <h1 class="text-center mb-4">Bienvenido, {{ auth()->user()->name }}</h1>

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
                        <h5 class="card-title">Total de Subcategorías</h5>
                        <p class="card-text">{{ $totalSubcategories }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-5 mb-3">Categorías</h3>
        <div id="categoryCarousel" class="carousel slide category-carousel mt-3" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($categories as $category)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <a href="{{ route('categories.subcategories', $category->id) }}">
                            <img src="{{ $category->image }}" class="d-block w-100" alt="{{ $category->name }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

    </div> 

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
                            <label for="subcategory_id" class="form-label">Subcategoría</label>
                            <select class="form-control" name="subcategory_id" required>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }} ({{ $subcategory->category->name ?? 'Sin Categoría' }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Libro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <div class="modal fade" id="addSubcategoryModal" tabindex="-1" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubcategoryModalLabel">Agregar Subcategoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subcategories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categoría Principal</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de la Subcategoría</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-info text-white">Guardar Subcategoría</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
