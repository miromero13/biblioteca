<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bienvenido a la Biblioteca</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #003366, #0056b3);
      margin: 0;
      color: white;
    }

    header {
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
      height: 50px;
      width: auto;
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

    .btn-login {
      background-color: #ffc107;
      color: #003366;
      font-weight: bold;
      padding: 10px 25px;
      border-radius: 30px;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.3s ease;
      font-size: 1rem;
    }

    .btn-login:hover {
      background-color: #e0a800;
      transform: translateY(-2px);
      color: #003366;
    }

    .content {
      margin-top: 100px;
    }

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

    footer {
      background-color: #003366;
      padding: 1rem;
      font-size: 0.9rem;
      color: white;
      text-align: center;
      width: 100%;
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="d-flex">
      <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcR_ncwih2AmwfJU0yHbQUuVNgPgPNTPAOGcjZr6F3f7Gvns1eag" alt="Logo Colegio" class="logo">
      <div class="school-name">Biblioteca Marcelino Champagnat</div>
    </div>
    <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
  </header>

  <!-- MAIN -->
  <main class="container content">
    <h1 class="text-center mb-4">Bienvenido</h1>

    <!-- CARRUSEL -->
    <div id="imageCarousel" class="carousel slide category-carousel mb-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://images.unsplash.com/photo-1683871268982-a19153dbb35d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Zm9uZG8lMjBkZSUyMGxhJTIwYmlibGlvdGVjYXxlbnwwfHwwfHx8MA%3D%3D" class="d-block w-100" alt="Imagen 1">
          <div class="carousel-caption d-none d-md-block">
            <h5>Biblioteca viva</h5>
          </div>
        </div>
        <div class="carousel-item">
          <img src="https://i.pinimg.com/736x/c5/fc/e2/c5fce2fd96228fb67875207810d909c7.jpg" class="d-block w-100" alt="Imagen 2">
          <div class="carousel-caption d-none d-md-block">
            <h5>Conocimiento en cada rincón</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>
  </main>

  <!-- FOOTER -->
  <footer>
    &copy; 2025 Colegio Marcelino Champagnat - Todos los derechos reservados
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
