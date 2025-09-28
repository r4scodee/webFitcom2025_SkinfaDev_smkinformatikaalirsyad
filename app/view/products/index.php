<?php ob_start(); ?>
<div class="top-header border-bottom bg-white shadow-sm">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between py-2 flex-wrap gap-2">

      <div class="d-md-none">
        <button class="btn btn-toggle" id="sidebarToggle" aria-label="Toggle sidebar" aria-expanded="false">
          <i class="fas fa-bars fa-lg" aria-hidden="true"></i>
        </button>
      </div>

      <div class="ms-2 order-3 order-md-1 page-title">
        <h3 class="fw-bold text-success d-flex align-items-center">
          <i class="fas fa-tags me-2"></i> Products Management
        </h3>
      </div>

      <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0 order-1 order-md-2">

        <div class="weather-widget d-none d-lg-flex align-items-center me-2">
          <i class="fas fa-sun text-warning me-1"></i>
          <div class="weather">
            <span id="weather-icon" class="me-2"></span>
            <span class="fw-semibold">24°C</span>
          </div>
        </div>

        <div class="dropdown me-2">
          <button class="btn btn-light position-relative" type="button">
            <i class="fas fa-bell"></i>
          </button>
        </div>

        <div class="dropdown">
          <button class="btn btn-light d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <img src="<?= BASE_URL ?>assets/img/dashboard-profile/admin.jpeg" alt="admin" class="profile-avatar">
            <div class="text-start d-none d-md-block me-2">
              <div class="fw-medium" style="font-size: 14px">Super Admin</div>
              <small class="text-muted">Farm Manager</small>
            </div>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?= BASE_URL?>errors">
                <i class="fas fa-user me-2 text-muted"></i>Profile Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL?>errors">
                <i class="fas fa-cog me-2 text-muted"></i>Preferences
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL?>errors">
                <i class="fas fa-chart-bar me-2 text-muted"></i>Analytics
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL?>products/exportPdf">
                <i class="fas fa-download me-2 text-muted"></i>Download Reports
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <a class="dropdown-item text-danger" href="/webFitcom2025_SkinfaDev_smkinformatikaalirsyad/logout.php">
                <i class="fas fa-sign-out-alt me-2"></i>Log Out
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="container-fluid px-4 py-4">
  <div class="dashboard-header p-4 mb-4 position-relative fade-in">
    <div class="row align-items-center position-relative g-3" style="z-index: 1;">
      <div class="row g-3 align-items-end">
        <div class="col-md-3">
          <div class="position-relative">
            <input type="text" id="searchProduct" class="form-control ps-5 rounded-5" placeholder="Cari Produk..." />
            <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
              <i class="fas fa-search text-muted"></i>
            </span>
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

        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
          <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
            <div class="d-flex align-items-center">
              <i class="fas fa-box text-info me-2"></i>
              <span>Total Products: <span class="fw-bold"><?= count($products) ?></span></span>
            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-calendar text-success me-2"></i>
              <span>Last Updated: Today</span>
            </div>
          </div>
          <div class="text-center text-md-end">
            <a href="<?= BASE_URL ?>products/create" class="btn rounded-5 w-100 w-md-auto btn-add-product px-3">
              <span class="fs-sm text-light">Tambah Produk</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card fade-in shadow-sm border-0">
    <div class="card-body pt-0 pb-4">
      <?php if (empty($products)): ?>
        <div class="alert alert-info">Belum ada produk.</div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table table-hover mb-0 rounded-3 align-middle" id="productTable">
            <thead>
              <tr>
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Kode</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Harga</th>
                <th class="px-4 py-3">Satuan</th>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($products as $p): ?>
                <tr class="align-middle">
                  <td class="px-4 py-3 fw-medium"><?= $no++ ?></td>
                  <td class="px-4 py-3 fw-medium">
                    <span class="badge bg-primary badge-custom">
                      <?= $this->e($p['code']) ?>
                    </span>
                  </td>
                  <td class="px-4 py-3 fw-medium"><?= $this->e($p['name']) ?></td>
                  <td class="px-4 py-3 fw-medium">
                    Rp
                    <?= number_format($p['price'], 0, ',', '.') ?>
                  </td>
                  <td class="px-4 py-3 fw-medium unit-col">
                    <span class="badge bg-success badge-custom">
                      <?= $this->e($p['unit']) ?>
                    </span>
                  </td>
                  <td class="px-4 py-3 fw-medium">
                    <?php if (!empty($p['image'])): ?>
                      <img src="<?= UPLOAD_URL . htmlspecialchars($p['image']) ?>" alt="img" class="thumb img-thumbnail"
                        width="60" />
                    <?php else: ?>
                      <span class="text-muted">-</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="d-flex h-100 justify-content-center align-items-center gap-2">
                      <a href="<?= BASE_URL ?>products/edit/<?= htmlspecialchars($p['id']) ?>"
                        class="btn btn-sm btn-outline-success">
                        <i class="fi fi-tr-pen-field"></i>
                      </a>
                      <!-- Tombol delete -->
                      <button type="button"
                              class="btn btn-sm btn-outline-danger btn-delete"
                              data-bs-toggle="modal"
                              data-bs-target="#deleteModal"
                              data-id="<?= htmlspecialchars($p['id']) ?>">
                        <i class="fi fi-tr-trash-xmark"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <!-- Modal Konfirmasi Hapus -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title">
                    Konfirmasi Hapus
                  </h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                  <div class="delete-animation mb-3">
                    <i class="fi fi-tr-trash-xmark text-danger fs-1"></i>
                  </div>
                  <p class="mb-0">Apakah Anda yakin ingin menghapus produk ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form id="deleteForm" method="post" action="">
                    <input type="hidden" name="_csrf" value="<?= $this->generateCSRFToken() ?>" />
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Overlay Animasi Checklist -->
          <div id="successOverlay" class="success-overlay d-none">
            <div class="checkmark-container">
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="checkmark-check" fill="none" d="M14 27l7 7 16-16"/>
              </svg>
              <p class="mt-3 text-white fw-bold">Data berhasil dihapus</p>
            </div>
          </div>

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

<footer class="bg-light text-dark py-4 mt-5 footer-products">
  <div class="container">
    <p class="mb-1">
      Copyrights &copy;
      <?= date('Y') ?>
      Tani Digital. All rights reserved.
    </p>
  </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const deleteButtons = document.querySelectorAll(".btn-delete");
  const deleteForm   = document.getElementById("deleteForm");
  const successOverlay = document.getElementById("successOverlay");

  // isi action delete form sesuai id produk
  deleteButtons.forEach(btn => {
    btn.addEventListener("click", function() {
      const productId = this.getAttribute("data-id");
      deleteForm.action = `<?= BASE_URL ?>products/delete/` + productId;
    });
  });

  // intercept submit
  deleteForm.addEventListener("submit", function(e) {
    e.preventDefault(); // tahan submit dulu
    const form = this;

    // tutup modal
    const modalEl = document.getElementById("deleteModal");
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();

    // tampilkan overlay + animasi
    successOverlay.classList.remove("d-none");

    // setelah 1.5 detik → submit beneran
    setTimeout(() => {
      form.submit();
    }, 1500);
  });
});
</script>