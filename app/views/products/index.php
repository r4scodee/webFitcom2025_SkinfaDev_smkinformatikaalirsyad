<?php ob_start(); ?>
<!-- Header -->
<header class="header">
  <div class="header-content">
    <div class="d-flex align-items-center">
      <button class="btn btn-link d-md-none me-3" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>
      <h1 class="page-title" id="pageTitle">Tabel Manajemen Produk</h1>
    </div>
    <div class="user-info">
      <span class="text-muted me-2">Admin</span>
      <div class="user-avatar">
        <i class="fas fa-user"></i>
      </div>
    </div>
  </div>
</header>

<!-- Content Area -->
<main class="container-fluid px-4 py-4">
  <!-- Controls Section -->
  <div class="card mb-4 fade-in">
    <div class="card-body">
      <div class="row g-3 align-items-end">
        <div class="col-md-3">
          <div class="position-relative">
            <input
              type="text"
              id="searchProduct"
              class="form-control ps-5 rounded-5"
              placeholder="Cari Produk..."
            />
            <span
              class="position-absolute top-50 start-0 translate-middle-y ms-3"
              ><i class="fi fi-tr-search"></i></span
            >
          </div>
        </div>

        <div class="col-md-2">
          <select id="filterUnit" class="form-select rounded-5">
            <option value="" class="">Semua Satuan</option>
            <?php
                  $unit = array_unique(array_column($products, 'unit'));
                    foreach ($unit as $s): ?>
            <option value="<?= strtolower($s) ?>" class="r">
              <?= htmlspecialchars($s) ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-auto ms-auto">
          <a href="<?= BASE_URL ?>products/create" class="btn btn-farm rounded-5">
            <span class="fs-sm">Tambah Produk</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Products Table -->
  <div class="card fade-in shadow-sm border-1">
    <div class="card-body">
      <?php if (empty($products)): ?>
      <div class="alert alert-info">Belum ada produk.</div>
      <?php else: ?>
      <div class="table-responsive">
        <table class="table table-hover mb-0 rounded-3 overflow-hidden">
          <thead>
            <tr>
              <th class="px-4 py-3">No</th>
              <th class="px-4 py-3">Kode</th>
              <th class="px-4 py-3">Nama</th>
              <th class="px-4 py-3">Harga</th>
              <th class="px-4 py-3">Satuan</th>
              <th class="px-4 py-3">Gambar</th>
              <th class="px-4 py-3">Aksi</th>
            </tr>
          </thead>
          <tbody id="producttable">
            <?php $no = 1;
              foreach ($products as $p): ?>
            <tr>
              <td class="px-4 py-3 fw-medium"><?= $no++ ?></td>
              <td class="px-4 py-3 fw-medium"><?= $this->e($p['code']) ?></td>
              <td class="px-4 py-3 fw-medium"><?= $this->e($p['name']) ?></td>
              <td class="px-4 py-3 fw-medium">
                Rp
                <?= number_format($p['price'], 0, ',', '.') ?>
              </td>
              <td class="px-4 py-3 fw-medium"><?= $this->e($p['unit']) ?></td>
              <td class="px-4 py-3 fw-medium">
                <?php if (!empty($p['image'])): ?>
                <img
                  src="<?= UPLOAD_URL . htmlspecialchars($p['image']) ?>"
                  alt="img"
                  class="thumb img-thumbnail"
                  width="60"
                />
                <?php else: ?>
                <span class="text-muted">-</span>
                <?php endif; ?>
              </td>
              <td
                class="px-4 py-3"
              >
                <a
                  href="<?= BASE_URL ?>products/edit/<?= htmlspecialchars($p['id']) ?>"
                  class="btn btn-sm btn-outline-success me-2"
                >
                  <i class="fi fi-tr-pen-field"></i>
                </a>
                <form
                  method="post"
                  action="<?= BASE_URL ?>products/delete/<?= htmlspecialchars($p['id']) ?>"
                  style="display: inline"
                  onsubmit="return confirm('Yakin hapus produk ini?')"
                >
                  <input
                    type="hidden"
                    name="_csrf"
                    value="<?= $this->generateCSRFToken() ?>"
                  />
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="fi fi-tr-trash-xmark"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php endif; ?>

      <div id="noResults" class="text-center py-5 d-none">
        <div class="display-1 text-muted mb-3">🔍</div>
        <h5 class="text-muted mb-2">No products found</h5>
        <p class="text-muted">Try adjusting your search or filter criteria</p>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-light text-dark py-4 mt-5 fixed-bottom" style="margin-left: 260px">
  <div class="container ps-5">
    <p class="mb-1">Copyrights &copy; <?= date('Y') ?> Skinfa Bertani. All rights reserved.</p>
  </div>
</footer>

<script>
  function filterTable() {
    var searchVal    = $("#searchProduct").val().toLowerCase(); 
    var unitVal      = $("#filterUnit").val().toLowerCase();     

    $("#productTable tr").filter(function () {
      var text     = $(this).text().toLowerCase();
      var unit     = $(this).find("td:nth-child(5)").text().toLowerCase(); 

      var matchSearch   = text.indexOf(searchVal) > -1;
      var matchUnit     = !unitVal || unit === unitVal;

      $(this).toggle(matchSearch && matchUnit);
    });
  }

  // Event listener
  $("#searchProduct").on("keyup", filterTable);
  $("#filterUnit").on("change", filterTable);
</script>