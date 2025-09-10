<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "Smart Farm" ?></title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Sidebar styling */
body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f5f8f2;
  margin: 0c !important;        /* hilangkan margin bawaan body */
  padding: 0 !important;       /* hilangkan padding bawaan body */
}

.container-fluid {
  padding-left: 20;  /* hilangkan padding kiri-kanan bootstrap */
  padding-right: 20;
}

.sidebar {
  min-height: 100vh;
  background: #3E5F44;
  border-right: 1px solid #5E936C;
}

.sidebar-link {
  width: 100%;
  text-align: center;
  padding: 12px 0;
  margin: 6px 0;
  border-radius: 12px;
  color: #fff;
  font-weight: 500;
  transition: all 0.3s ease;
}

.sidebar-link:hover {
  background: #e9f7ef;
  color: #5E936C;
  transform: translateX(5px);
}

.sidebar-link.active {
  background: #5E936C;
  color: #fff !important;
  box-shadow: 0 3px 10px rgba(25, 135, 84, 0.3);
}
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar d-flex flex-column align-items-center pt-4">
      <h4 class="mb-5 fw-bold text-white">🌱 Smart Farm</h4>

      <a href="<?= BASE_URL ?>dashboard" 
      class="nav-link sidebar-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>

      <a href="<?= BASE_URL ?>products" 
      class="nav-link sidebar-link <?= ($active ?? '') === 'products' ? 'active' : '' ?>">
      <i class="bi bi-table me-2"></i> Table Produk
      </a>
    </nav>


    <!-- Content -->
    <main class="col-md-10 p-4">
      <?= $content ?>
    </main>
  </div>
</div>
<script>
$(document).ready(function(){
  $(".sidebar-link").on("click", function(){
    $(".sidebar-link").removeClass("active");
    $(this).addClass("active");
  });
});
</script>
</body>
</html>
