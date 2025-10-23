<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? "Tani Digital" ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/dashboard-style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-thin-rounded/css/uicons-thin-rounded.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body class="d-flex flex-column">

<!-- Sidebar -->
 <nav class="sidebar" id="sidebarbtn">
    <div class="sidebar-header">
      <div class="sidebar-brand">
        <img src="<?= BASE_URL ?>assets/img/logo/logo-dashboard-img.png" alt="Logo" width="35" height="35" class="ms-3">
        <span>TANI DIGITAL</span>
      </div>
    </div>
    <ul class="sidebar-nav">
      <li class="nav-item">
        <a href="<?= BASE_URL ?>"
          class="nav-link sidebar-link <?= ($active ?? '') === 'product' ? 'active' : '' ?>">
          <span>Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= BASE_URL ?>gudang"
          class="nav-link sidebar-link <?= ($active ?? '') === 'gudang' ? 'active' : '' ?>">
          <span>Gudang</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= BASE_URL ?>kendaraan"
          class="nav-link sidebar-link <?= ($active ?? '') === 'kendaraan' ? 'active' : '' ?>">
          <span>Kendaraan</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= BASE_URL ?>pengiriman"
          class="nav-link sidebar-link <?= ($active ?? '') === 'pengiriman' ? 'active' : '' ?>">
          <span>Pengiriman</span>
        </a>
      </li>
    </ul>
  </nav>
  
  <div class="main-content min-vh-100">
    <?= $content ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>assets/js/dashboard-style.js"></script>

</body>
</html>