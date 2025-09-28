<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? "Skinfa Bertani" ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dashboard-style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body class="d-flex flex-column">
  <!-- Sidebar -->
  <nav class="sidebar" id="sidebarbtn">
    <div class="sidebar-header">
      <a href="<?= BASE_URL ?>dashboard" class="sidebar-brand">
        <img src="<?= BASE_URL ?>assets/img/logo/logo-dashboard-img.png" alt="Logo" width="35" height="35" class="ms-3">
        <span>TANI DIGITAL</span>
      </a>
    </div>
    <ul class="sidebar-nav">
      <li class="nav-item">
        <a href="<?= BASE_URL ?>dashboard"
          class="nav-link sidebar-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">
          <i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= BASE_URL ?>products"
          class="nav-link sidebar-link <?= ($active ?? '') === 'products' ? 'active' : '' ?>">
          <i class="fas fa-boxes"></i>
          <span>Products</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= BASE_URL ?>reports" class="nav-link">
          <i class="fas fa-chart-line"></i>
          <span>Reports</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="main-content min-vh-100">
    <?= $content ?>
  </div>

  <script src="<?= BASE_URL ?>assets/js/dashboard-style.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>