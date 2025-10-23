<?php ob_start(); ?>

<style>
    /* ====== Animasi & Style Umum ====== */
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

    body {
        background: #f8fdf5;
        font-family: "Inter", sans-serif !important;
        color: #2d5016;
        margin: 0;
        padding: 0;
    }

    /* ====== GRADIENT HEADER ====== */
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

    /* ====== TABEL ====== */
    .table-responsive {
        overflow-x: auto;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }
</style>

<div class="top-header border-bottom bg-white shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between py-2 flex-nowrap gap-2">
            <div class="d-md-none">
                <button class="btn btn-toggle" id="sidebarToggle" aria-label="Toggle sidebar" aria-expanded="false">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>

            <div class="ms-2 order-3 order-md-1 page-title">
                <h3 class="mb-0 fw-bold text-success d-flex align-items-center">
                    <i class="fas fa-seedling me-2"></i> Manajemen Kendaraan
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
            <div class="col-md-6">
                <div class="position-relative">
                    <input type="text" id="searchKendaraan" class="form-control ps-5 rounded-5 border-0 shadow-sm"
                        placeholder="Cari Kendaraan..." />
                    <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="<?= BASE_URL ?>kendaraan/create"
                    class="btn btn-light text-success px-4 py-2 rounded-5 fw-semibold shadow-sm d-inline-flex align-items-center gap-2 border-0">
                    <i class="fas fa-plus-circle"></i> Tambah Kendaraan
                </a>
            </div>
        </div>
    </div>

    <!-- Table Kendaraan -->
    <div class="card fade-in shadow-sm border-0">
        <div class="card-body pt-0 pb-4">
            <?php if (empty($kendaraans)): ?>
                <div class="alert alert-info">Belum ada kendaraan.</div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 rounded-3 align-middle" id="kendaraanTable">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 fs-lg">No. Polisi</th>
                                <th class="px-4 py-3 fs-lg">Nama Kendaraan</th>
                                <th class="px-4 py-3 fs-lg">Jenis</th>
                                <th class="px-4 py-3 fs-lg">Tahun</th>
                                <th class="px-4 py-3 fs-lg">Kapasitas</th>
                                <th class="px-4 py-3 fs-lg">Driver</th>
                                <th class="px-4 py-3 fs-lg">Kontak Driver</th>
                                <th class="px-4 py-3 fs-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kendaraans as $k): ?>
                                <tr class="align_middle">
                                    <td class="px-4 py-3 fw-medium"><span class="badge bg-primary"><?= htmlspecialchars($k['nopol']) ?></span></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['namakendaraan']) ?></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['jenis']) ?></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['tahun']) ?></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['kapasitas']) ?></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['driver']) ?></td>
                                    <td class="px-4 py-3 fw-medium"><?= htmlspecialchars($k['kontakdriver']) ?></td>
                                    <td class="px-4 py-3 fw-medium">
                                        <div class="d-flex h-100 justify-content-center align-items-center gap-2">
                                            <a href="<?= BASE_URL ?>kendaraan/edit/<?= htmlspecialchars($p['id']) ?>"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="fi fi-tr-pen-field"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger btn-delete"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
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
                                    <h5 class="modal-title text-white">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
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
                <p class="text-muted mt-4">Kendaraan tidak ditemukan</p>
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

        deleteButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                const id = this.getAttribute("data-id");
                deleteForm.action = <?= BASE_URL ?>kendaraan/delete/ + id;
            });
        });
    });
</script>