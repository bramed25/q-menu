
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Panel Gerente - Q-Menu</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
</head>

<body class="dashboard-body">

  <header id="header" class="header d-flex align-items-center sticky-top header-dashboard">
    <div class="container-fluid d-flex align-items-center px-4">
      
      <button class="navbar-toggler d-md-none collapsed border-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation" style="color: var(--default-color);">
          <i class="bi bi-list fs-1"></i>
      </button>

      <a href="{{ url('/') }}" class="logo d-flex align-items-center ms-2 ms-md-0">
        <img src="{{ asset('assets/img/logo-qmenu.png') }}" alt="" style="max-height: 40px;">
        <h1 class="sitename ms-2 fs-4">Q-Menu <span class="badge bg-secondary fs-6 ms-2" style="vertical-align: middle;">Admin</span></h1>
      </a>

      <div class="d-flex align-items-center ms-auto">
        <span class="me-3 d-none d-md-block">Hola, <strong>Gerente</strong></span>
        <a class="btn btn-outline-danger btn-sm rounded-pill px-3" href="{{ url('/login') }}">Salir</a>
      </div>

    </div>
  </header>

  <div class="container-fluid">
    <div class="row">

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse px-3 py-4 bg-white">
        <div class="position-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="bi bi-grid-1x2-fill me-2"></i>
                Resumen
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-egg-fried me-2"></i>
                Platillos y Menú
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-people-fill me-2"></i>
                Usuarios (Staff)
              </a>
            </li>
            <li class="nav-item mt-4">
              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Operaciones</span>
              </h6>
              <a class="nav-link text-success fw-bold" href="{{ url('/kds') }}" target="_blank">
                <i class="bi bi-display me-2"></i>
                Lanzar Pantalla KDS
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Gestión de Platillos</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-primary d-flex align-items-center"
              style="background-color: var(--accent-color); border:none;">
              <i class="bi bi-plus-lg me-2"></i> Nuevo Platillo
            </button>
          </div>
        </div>

        <div class="card card-dashboard p-4 mb-4">
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Categoría</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Estado</th>
                  <th scope="col" class="text-end">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img src="{{ asset('assets/img/portfolio/product-1.jpg') }}" class="rounded" width="50" alt=""></td>
                  <td class="fw-bold">Hamburguesa Clásica</td>
                  <td>Plato Fuerte</td>
                  <td>$120.00</td>
                  <td><span class="badge bg-success">Activo</span></td>
                  <td class="text-end">
                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><img src="{{ asset('assets/img/portfolio/product-2.jpg') }}" class="rounded" width="50" alt=""></td>
                  <td class="fw-bold">Tacos al Pastor (Orden)</td>
                  <td>Plato Fuerte</td>
                  <td>$85.00</td>
                  <td><span class="badge bg-success">Activo</span></td>
                  <td class="text-end">
                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><img src="{{ asset('assets/img/portfolio/product-3.jpg') }}" class="rounded" width="50" alt=""></td>
                  <td class="fw-bold">Malteada de Fresa</td>
                  <td>Bebidas</td>
                  <td>$60.00</td>
                  <td><span class="badge bg-warning text-dark">Agotado</span></td>
                  <td class="text-end">
                    <button class="btn btn-sm btn-outline-secondary me-1"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/admin-logic.js') }}"></script>

</body>

</html>