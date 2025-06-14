You're asking for the **browser's default "required" message** to appear in Spanish. While you have `lang="es"` on the `<html>` tag, which is a good start, sometimes browsers don't fully translate these messages based solely on that.

To ensure the "required" message is consistently in Spanish across all modern browsers for your form fields, you can use the **`oninvalid`** and **`oninput`** event handlers in conjunction with the `setCustomValidity()` method. This allows you to define your own custom validation messages.

Here's how you can modify your input fields and add a small JavaScript snippet to achieve this:

---

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <style>
    .category-carousel .carousel-item img {
      height: 400px;
      object-fit: cover;
      width: 100%;
      display: block;
      border-radius: 0;
    }

    .carousel-item {
      position: relative;
    }

    .carousel-caption {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 5px;
    }

    .carousel-caption h5 {
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
      font-size: 2.5rem;
    }

    .carousel-inner {
      overflow: hidden;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #003366;
      padding: 15px 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 10;
    }

    .logo-img {
      width: 60px;
      height: 60px;
      border-radius: 8px;
      object-fit: cover;
      background-color: white;
      padding: 5px;
    }

    .school-name {
      color: white;
      font-weight: bold;
      font-size: 20px;
      margin-left: 15px;
    }

    header .d-flex {
      display: flex;
      align-items: center;
    }

    header button {
      font-weight: bold;
      padding: 10px 20px;
      margin-left: 10px;
    }

    .logout-btn {
      font-size: 16px;
      background-color: transparent;
      border: none;
      color: white;
    }

    .logout-btn:hover {
      color: #ff6666;
    }

    .logout-btn i {
      font-size: 20px;
    }

    .content {
      margin-top: 100px;
    }

    .card {
      border-radius: 8px;
      background-color: #f9f9f9;
      margin-bottom: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

    footer {
      background-color: #003366;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 50px;
      width: 100%;
    }

    .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background-color: #003366;
        color: white;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .modal-title {
        font-weight: bold;
    }

    .modal-body input,
    .modal-body select {
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 10px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .modal-body input:focus,
    .modal-body select:focus {
        border-color: #0056b3;
        box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.25);
    }

    .modal-footer {
        border-top: none;
        padding-top: 0;
    }

    .btn-close {
        filter: invert(1);
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='7'%3E%3Cpath fill='%23003366' d='M0 0l5 7 5-7z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 12px;
        padding-right: 2.5rem;
    }

  </style>
</head>
<body>

  <header>
    <div class="d-flex">
      <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR_ncwih2AmwfJU0yHbQUuVNgPgPNTPAOGcjZr6F3f7Gvns1eag" alt="Logo" class="logo-img">
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
  </header>

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
    <div class="row">
      @foreach ($categories as $category)
      <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ route('categories.subcategories', $category->id) }}" class="text-decoration-none">
          <div class="card shadow-sm h-100">
            <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->name }}" style="height: 200px; object-fit: cover;">
            <div class="card-body text-center">
              <h5 class="card-title">{{ $category->name }}</h5>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>

  <footer>
    &copy; 2025 Colegio Marcelino Champagnat - Todos los derechos reservados
  </footer>

  <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('books.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addBookModalLabel">Agregar Libro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input class="form-control mb-2" type="text" name="code" placeholder="Código *" required oninvalid="this.setCustomValidity('Por favor, ingresa el código del libro.')" oninput="this.setCustomValidity('')">
            <input class="form-control mb-2" type="number" name="quantity" placeholder="Cantidad *" required oninvalid="this.setCustomValidity('Por favor, ingresa la cantidad de libros.')" oninput="this.setCustomValidity('')">
            <input class="form-control mb-2" type="text" name="title" placeholder="Título *" required oninvalid="this.setCustomValidity('Por favor, ingresa el título del libro.')" oninput="this.setCustomValidity('')">
            <input class="form-control mb-2" type="text" name="author" placeholder="Autor" required oninvalid="this.setCustomValidity('Por favor, ingresa el autor del libro.')" oninput="this.setCustomValidity('')">
            <input class="form-control mb-2" type="text" name="editorial" placeholder="Editorial" required oninvalid="this.setCustomValidity('Por favor, ingresa la editorial del libro.')" oninput="this.setCustomValidity('')">
            <input class="form-control mb-2" type="number" name="year" placeholder="Año" required oninvalid="this.setCustomValidity('Por favor, ingresa el año de publicación.')" oninput="this.setCustomValidity('')">
            <select class="form-control" name="subcategory_id" required oninvalid="this.setCustomValidity('Por favor, selecciona una subcategoría.')" oninput="this.setCustomValidity('')">
                <option value="" disabled selected>Selecciona una subcategoría *</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }} ({{ $subcategory->category->name ?? 'Sin Categoría' }})</option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar Libro</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('categories.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Agregar Categoría</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input class="form-control mb-3" type="text" name="name" placeholder="Nombre de la Categoría *" required oninvalid="this.setCustomValidity('Por favor, ingresa el nombre de la categoría.')" oninput="this.setCustomValidity('')">
            <input class="form-control" type="text" name="image" placeholder="URL de la Imagen" required oninvalid="this.setCustomValidity('Por favor, ingresa la URL de la imagen.')" oninput="this.setCustomValidity('')">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar Categoría</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addSubcategoryModal" tabindex="-1" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('subcategories.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Agregar Subcategoría</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <select class="form-control mb-3" name="category_id" required oninvalid="this.setCustomValidity('Por favor, selecciona una categoría.')" oninput="this.setCustomValidity('')">
              <option value="">Selecciona una categoría *</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <input class="form-control" type="text" name="name" placeholder="Nombre de la Subcategoría *" required oninvalid="this.setCustomValidity('Por favor, ingresa el nombre de la subcategoría.')" oninput="this.setCustomValidity('')">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info text-white">Guardar Subcategoría</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```