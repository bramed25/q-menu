<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>KDS Cocina - Q-Menu</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body class="kds-body">

  <nav class="navbar navbar-dark bg-dark border-bottom border-secondary px-3">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/img/logo-qmenu.png" alt="" width="30" class="d-inline-block align-text-top me-2">
        <span class="fw-bold">Pantalla de Cocina 01</span>
      </a>
      
      <div class="d-flex gap-2">
        <span class="badge bg-success d-flex align-items-center"><i class="bi bi-wifi me-1"></i> Conectado</span>
        <button class="btn btn-outline-light btn-sm" onclick="toggleFullScreen()">
            <i class="bi bi-arrows-fullscreen"></i>
        </button>
      </div>
    </div>
  </nav>

  <div class="container-fluid py-4">
    
    <div class="row" id="orders-container">

      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="kds-ticket ticket-new shadow">
            <div class="ticket-header">
                <span class="fs-5">Mesa #4</span>
                <span class="badge bg-primary text-light">hace 2 min</span>
            </div>
            <div class="ticket-body">
                <div class="ticket-item">
                    <span>2x Tacos Pastor</span>
                </div>
                <div class="ticket-item">
                    <span>1x Coca Cola</span>
                    <small class="text-muted">Sin hielo</small>
                </div>
                <div class="ticket-item fw-bold text-danger">
                    <span>! ALERTA: S/Cebolla</span>
                </div>
            </div>
            <button class="btn btn-success btn-kds-action" onclick="completeOrder(this)">
                <i class="bi bi-check-lg"></i> Listo
            </button>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="kds-ticket ticket-urgent shadow">
            <div class="ticket-header">
                <span class="fs-5">Mesa #1</span>
                <span class="badge bg-danger text-light">hace 15 min</span>
            </div>
            <div class="ticket-body">
                <div class="ticket-item">
                    <span>1x Hamburguesa Esp.</span>
                </div>
                <div class="ticket-item">
                    <span>1x Papas Fritas</span>
                </div>
            </div>
            <button class="btn btn-success btn-kds-action" onclick="completeOrder(this)">
                <i class="bi bi-check-lg"></i> Listo
            </button>
        </div>
      </div>

    </div>
  </div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <script src="assets/js/kds.js"></script>

</body>
</html>