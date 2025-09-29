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
          <i class="fas fa-tachometer-alt me-2"></i> Dashboard Overview
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
              <a class="dropdown-item" href="<?= BASE_URL ?>profile">
                <i class="fas fa-user me-2 text-muted"></i>Profile Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>preferences">
                <i class="fas fa-cog me-2 text-muted"></i>Preferences
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>errors">
                <i class="fas fa-chart-bar me-2 text-muted"></i>Analytics
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>products/exportPdf">
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
  <div id="dashboardPage" class="page-content">
    <div class="welcome-card fade-in">
      <div class="welcome-section">
        <h1 class="welcome-title text-light">🌱 Halo, Admin!</h1>
        <p class="welcome-subtitle">
          Pertanian digital Anda berkembang dengan baik! Berikut gambaran
          singkat kondisi hari ini.
        </p>
        <span class="celebration-badge">🎉 Kinerja Luar Biasa Hari Ini!</span>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon plants">
            <i class="fas fa-seedling"></i>
          </div>
          <div class="stats-value">192</div>
          <div class="stats-label">Produk Terjual Minggu Ini</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon harvest">
            <i class="fas fa-apple-alt"></i>
          </div>
          <div class="stats-value">72kg</div>
          <div class="stats-label">Total Panen Bulan Ini</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon sensors">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="stats-value">128</div>
          <div class="stats-label">Pesanan Diproses</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon alerts">
            <i class="fas fa-users"></i>
          </div>
          <div class="stats-value">56</div>
          <div class="stats-label">Pelanggan Baru</div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="fas fa-box-open"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark">27</div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Produk Hampir Habis</h3>
                </div>
              </div>
              <a href="javascript:void(0);" class="">
                <i class="feather-more-vertical"></i>
              </a>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Stok Rendah</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">27 Produk</span>
                  <span class="fs-11 text-muted">(15%)</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 15%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="fas fa-receipt"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark">225</div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Transaksi Berhasil</h3>
                </div>
              </div>
              <a href="javascript:void(0);" class="">
                <i class="feather-more-vertical"></i>
              </a>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Hari Ini</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">Rp 9.275.000</span>
                  <span class="fs-11 text-muted">(82%)</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-success" role="progressbar" style="width: 82%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="fas fa-truck"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark">116</div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Pesanan Dikirim</h3>
                </div>
              </div>
              <a href="javascript:void(0);" class="">
                <i class="feather-more-vertical"></i>
              </a>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Hari Ini</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">116 Pesanan</span>
                  <span class="fs-11 text-muted">(78%)</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 78%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- [Tingkat Kepuasan] -->
      <div class="col-xxl-3 col-md-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-4">
              <div class="d-flex gap-4 align-items-center">
                <div class="avatar-text avatar-lg bg-gray-200">
                  <i class="fas fa-smile-beam"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold text-dark">92%</div>
                  <h3 class="fs-13 fw-semibold text-truncate-1-line">Tingkat Kepuasan</h3>
                </div>
              </div>
              <a href="javascript:void(0);" class="">
                <i class="feather-more-vertical"></i>
              </a>
            </div>
            <div class="pt-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Dari Ulasan</a>
                <div class="w-100 text-end">
                  <span class="fs-12 text-dark">4.8 / 5</span>
                  <span class="fs-11 text-muted">(92%)</span>
                </div>
              </div>
              <div class="progress mt-2 ht-3">
                <div class="progress-bar bg-info" role="progressbar" style="width: 92%"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xxl-8">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Penjualan Bulanan</h5>

          </div>
          <div class="card-body custom-card-action p-0">
            <div id="chart-penjualan"></div>
          </div>
          <div class="card-footer">
            <div class="row g-4">
              <div class="col-lg-3">
                <div class="p-3 border border-dashed rounded">
                  <div class="fs-12 text-muted mb-1">Menunggu Pembayaran</div>
                  <h6 class="fw-bold text-dark">Rp5.486.000</h6>
                  <div class="progress mt-2 ht-3">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 81%"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="p-3 border border-dashed rounded">
                  <div class="fs-12 text-muted mb-1">Berhasil</div>
                  <h6 class="fw-bold text-dark">Rp9.275.000</h6>
                  <div class="progress mt-2 ht-3">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 82%"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="p-3 border border-dashed rounded">
                  <div class="fs-12 text-muted mb-1">Ditolak</div>
                  <h6 class="fw-bold text-dark">Rp3.868.000</h6>
                  <div class="progress mt-2 ht-3">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 68%"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="p-3 border border-dashed rounded">
                  <div class="fs-12 text-muted mb-1">Pendapatan</div>
                  <h6 class="fw-bold text-dark">Rp50.668.000</h6>
                  <div class="progress mt-2 ht-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: 75%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-4">
        <div class="card stretch stretch-full">
          <div class="card-header">
            <h5 class="card-title">Cuaca Hari ini</h5>

          </div>
          <div class="card-body custom-card-action">
            <div id="weather-overview-donut"></div>
            <div class="row g-2">
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #FFD700"></span>
                  <span>Cerah</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #1E90FF"></span>
                  <span>Hujan</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #7F8C8D"></span>
                  <span>Mendung</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #2ECC71"></span>
                  <span>Berawan</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #FF7F50"></span>
                  <span>Angin</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #00CED1"></span>
                  <span>Kelembapan</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #9B59B6"></span>
                  <span>UV index</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #E74C3C"></span>
                  <span>Peringatan</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                  <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #34495E"></span>
                  <span>Lainnya</span>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>


  <footer class="bg-light text-dark py-4 mt-5 footer-dashboard">
    <div class="container">
      <p class="mb-1">Copyrights &copy; <?= date('Y') ?> Tani Digital. All rights reserved.</p>
    </div>
  </footer>