<?php ob_start(); ?>

<style>
  /* Animasi pergeseran warna background */
  @keyframes gradientShift {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  /* Animasi fade masuk */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(12px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Style umum */
  body {
    background: #f8fdf5;
    font-family: "Inter", sans-serif !important;
    color: #2d5016;
    margin: 0;
    padding: 0;
  }

  /* ====== GRADIENT BG DENGAN ANIMASI ====== */
  .gradient-bg {
    background: linear-gradient(135deg, #22c55e, #16a34a, #14b8a6, #3b82f6);
    background-size: 400% 400%;
    animation: gradientShift 10s ease infinite, fadeIn 1s ease both;
    color: #fff;
    border-radius: 1.2rem;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    padding: 2rem 1.5rem;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .gradient-bg:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.18);
  }

  /* ====== HEADER ====== */
  .top-header {
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  .page-title h3 {
    font-weight: 700;
    letter-spacing: -0.3px;
  }

  .profile-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 0 0 2px #22c55e33;
  }

  .row.g-4 {
    display: flex;
    flex-wrap: nowrap;
    gap: 1.2rem;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    padding-bottom: 0.5rem;
  }

  .row.g-4::-webkit-scrollbar {
    height: 8px;
  }

  .row.g-4::-webkit-scrollbar-thumb {
    background: rgba(34, 197, 94, 0.4);
    border-radius: 10px;
  }

  .row.g-4>div {
    flex: 0 0 48%;
    scroll-snap-align: start;
  }

  .info-card {
    border: none;
    border-radius: 1.25rem;
    background: #ffffff;
    transition: all 0.35s ease;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
    overflow: hidden;
    position: relative;
  }

  .info-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(90deg, #22c55e, #14b8a6, #3b82f6);
    border-top-left-radius: 1.25rem;
    border-top-right-radius: 1.25rem;
  }

  .info-card .card-body {
    display: flex;
    align-items: center;
    justify-content: start;
    gap: 1rem;
    padding: 1.4rem 1.4rem;
  }

  .info-icon {
    font-size: 1.6rem;
    background: linear-gradient(135deg, #22c55e, #3b82f6);
    color: #fff;
    padding: 0.8rem;
    border-radius: 50%;
    box-shadow: 0 4px 10px rgba(34, 197, 94, 0.3);
    flex-shrink: 0;
  }

  .info-text h5 {
    margin-bottom: 0.4rem;
    font-size: 1.05rem;
    font-weight: 700;
    color: #1f2937;
    letter-spacing: -0.3px;
  }

  .info-text p {
    margin: 0;
    font-size: 0.95rem;
    color: #4b5563;
    white-space: nowrap;
  }

  @media (max-width: 992px) {
    .row.g-4>div {
      flex: 0 0 80%;
    }

    .info-card .card-body {
      flex-direction: row;
      text-align: left;
      padding: 1.2rem 1.4rem;
    }

    .info-text p {
      white-space: normal;
      line-height: 1.4;
      word-wrap: break-word;
    }
  }

  @media (max-width: 576px) {
    .row.g-4>div {
      flex: 0 0 90%;
    }

    .info-card .card-body {
      flex-direction: column;
      text-align: center;
      align-items: center;
      padding: 1.3rem;
    }

    .info-icon {
      margin-bottom: 0.8rem;
    }
  }
</style>

<div class="top-header border-bottom bg-white shadow-sm">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between py-2 flex-nowrap gap-2">

    <div class="d-md-none">
        <button class="btn btn-toggle" id="sidebarToggle" aria-label="Toggle sidebar" aria-expanded="false">
          <i class="fas fa-bars fa-lg" aria-hidden="true"></i>
        </button>
      </div>

      <div class="ms-2 order-3 order-md-1 page-title">
        <h3 class="mb-0 fw-bold text-success d-flex align-items-center">
          <i class="fas fa-seedling me-2"></i> Manajemen Produk
        </h3>
      </div>
      
      <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0 order-1 order-md-2">
        <div class="d-flex align-items-center p-2">
          <img src="<?= BASE_URL ?>assets/img/logo/logo-dashboard-img.png" alt="admin" class="profile-avatar">
          <div class="text-start d-md-block me-2">
            <small class="text-muted">Super Admin</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<main class="container-fluid px-4 py-4">
  <!-- Header -->
  <div class="dashboard-header p-4 mb-4 position-relative gradient-bg rounded-4 shadow-sm">
    <div class="row align-items-center g-3">
      <div class="col-md-3">
        <div class="position-relative">
          <input type="text" id="searchProduct" class="form-control ps-5 rounded-5 border-0 shadow-sm"
            placeholder="Cari gudang..." />
          <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
            <i class="fas fa-search text-muted"></i>
          </span>
        </div>
      </div>

      <div class="col-md-6 text-center text-md-end">
        <a href="<?= BASE_URL ?>gudang/create"
          class="btn btn-light text-success px-4 py-2 rounded-5 fw-semibold shadow-sm d-inline-flex align-items-center gap-2 border-0">
          <i class="fas fa-plus-circle"></i>
          Tambah Gudang
        </a>
      </div>
    </div>
  </div>



  <!-- Table Produk -->
  <div class="card fade-in shadow-sm border-0">
    <div class="card-body pt-0 pb-4">
      <?php if (empty($gudang)): ?>
        <div class="alert alert-info">Belum ada produk.</div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table table-hover mb-0 rounded-3 align-middle" id="productTable">
            <thead>
              <tr>
                <th class="px-4 py-3 fs-lg">Kode Gudang</th>
                <th class="px-4 py-3 fs-lg">Nama gudang</th>
                <th class="px-4 py-3 fs-lg">Golongan</th>
                <th class="px-4 py-3 fs-lg">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gudang as $p): ?>
                <tr class="align-middle">
                  <td class="px-4 py-3 fw-medium">
                    <span class="badge bg-primary"><?= $this->e($p['kodegudang']) ?></span>
                  </td>
                  <td class="px-4 py-3 fw-medium"><?= $this->e($p['namagudang']) ?></td>
                  <td class="px-4 py-3 fw-medium">
                    <span class="badge bg-success"><?= $this->e($p['golongan']) ?></span>
                  </td>
                  <td class="px-4 py-3 fw-medium">
                    <span class="badge bg-success"><?= $this->e($p['keterangan']) ?></span>
                  </td>
                  <td>
                    <div class="d-flex h-100 justify-content-center align-items-center gap-2">
                      <a href="<?= BASE_URL ?>gudang/edit/<?= htmlspecialchars($p['id']) ?>"
                        class="btn btn-sm btn-outline-success">
                        <i class="fi fi-tr-pen-field"></i>
                      </a>
                      <button type="button" class="btn btn-sm btn-outline-danger btn-delete" data-bs-toggle="modal"
                        data-bs-target="#deleteModal" data-id="<?= htmlspecialchars($p['id']) ?>">
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
                  <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                  <div class="delete-animation mb-3">
                    <i class="fi fi-tr-trash-xmark text-danger fs-1"></i>
                  </div>
                  <p class="mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
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

          <!-- Overlay Sukses -->
          <div id="successOverlay" class="success-overlay d-none">
            <div class="checkmark-container">
              <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle class="checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                <path class="checkmark-check" fill="none" d="M14 27l7 7 16-16" />
              </svg>
              <p class="mt-3 text-white fw-bold">Data berhasil dihapus</p>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div id="noResults" class="text-center d-none">
        <p class="text-muted mt-4">Gudang tidak ditemukan</p>
      </div>
    </div>
  </div>
</main>

<footer class="bg-light text-dark py-4 mt-5">
    <div class="container text-center">
        &copy; <?= date('Y') ?> Tani Digital. Semua Hak Dilindungi.
    </div>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".btn-delete");
    const deleteForm = document.getElementById("deleteForm");
    const successOverlay = document.getElementById("successOverlay");

    deleteButtons.forEach(btn => {
      btn.addEventListener("click", function () {
        const gudangId = this.getAttribute("data-id");
        deleteForm.action = `<?= BASE_URL ?>gudang/delete/` + gudangId;
      });
    });

    deleteForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const form = this;
      const modalEl = document.getElementById("deleteModal");
      const modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();

      successOverlay.classList.remove("d-none");
      setTimeout(() => form.submit(), 1500);
    });
  });
</script>