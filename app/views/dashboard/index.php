<?php ob_start(); ?>
<!-- Header -->
<div class="top-header border-bottom bg-white shadow-sm">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between py-2 flex-wrap gap-2">

      <!-- Sidebar Toggle (mobile only) -->
      <div class="d-md-none">
        <button class="btn btn-toggle" id="sidebarToggle" aria-label="Toggle sidebar" aria-expanded="false">
          <i class="fas fa-bars fa-lg" aria-hidden="true"></i>
        </button>
      </div>

      <!-- Page Title -->
      <div class="ms-2 order-3 order-md-1 page-title">
        <h3 class="fw-bold text-success d-flex align-items-center">
          <i class="fas fa-tachometer-alt me-2"></i> Dashboard Overview
        </h3>
      </div>


      <!-- Actions (right side) -->
      <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0 order-1 order-md-2">

        <!-- Weather Widget (desktop only) -->
        <div class="weather-widget d-none d-lg-flex align-items-center me-2">
          <i class="fas fa-sun text-warning me-1"></i>
          <div class="weather">
            <span id="weather-icon" class="me-2"></span>
            <span class="fw-semibold">24°C</span>
          </div>
        </div>

        <!-- Notifications -->
        <div class="dropdown me-2">
          <button
            class="btn btn-light position-relative"
            type="button"
          >
            <i class="fas fa-bell"></i>
          </button>
        </div>

        <!-- Profile -->
        <div class="dropdown">
          <button
            class="btn btn-light d-flex align-items-center"
            type="button"
            data-bs-toggle="dropdown"
          >
            <img src="<?= BASE_URL ?>asset/img/admin.jpeg" alt="admin" class="profile-avatar">
            <div class="text-start d-none d-md-block me-2">
              <div class="fw-medium" style="font-size: 14px">Super Admin</div>
              <small class="text-muted">Farm Manager</small>
            </div>
            <i class="fas fa-chevron-down text-muted"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-user me-2 text-muted"></i>Profile Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cog me-2 text-muted"></i>Preferences
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="fas fa-chart-bar me-2 text-muted"></i>Analytics
              </a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item text-danger" href="#">
                <i class="fas fa-sign-out-alt me-2"></i>Sign Out
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Dashboard Content -->
<main class="container-fluid px-4 py-4">
  <!-- Dashboard Page -->
  <div id="dashboardPage" class="page-content">
    <!-- Welcome Card -->
    <div class="welcome-card fade-in">
      <div class="welcome-section">
        <h1 class="welcome-title">🌱 Halo, Admin!</h1>
        <p class="welcome-subtitle">
          Pertanian digital Anda berkembang dengan baik! Berikut gambaran
          singkat kondisi hari ini.
        </p>
        <span class="celebration-badge">🎉 Kinerja Luar Biasa Hari Ini!</span>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon plants">
            <i class="fas fa-seedling"></i>
          </div>
          <div class="stats-value">1,247</div>
          <div class="stats-label">Active Plants</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon harvest">
            <i class="fas fa-apple-alt"></i>
          </div>
          <div class="stats-value">89.2kg</div>
          <div class="stats-label">Today's Harvest</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon sensors">
            <i class="fas fa-thermometer-half"></i>
          </div>
          <div class="stats-value">24°C</div>
          <div class="stats-label">Avg Temperature</div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-3">
        <div class="stats-card fade-in">
          <div class="stats-icon alerts">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <div class="stats-value">3</div>
          <div class="stats-label">Active Alerts</div>
        </div>
      </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <div class="chart-card fade-in">
          <h3 class="chart-title">
            <i class="fas fa-chart-line me-2"></i>
            Weekly Growth Progress
          </h3>
          <canvas id="growthChart" height="100"></canvas>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="chart-card fade-in">
          <h3 class="chart-title">
            <i class="fas fa-cloud-sun me-2"></i>
            Weather Conditions
          </h3>
          <canvas id="weatherChart" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-light text-dark py-4 mt-5 footer-dashboard">
  <div class="container">
    <p class="mb-1">Copyrights &copy; <?= date('Y') ?> Skinfa Bertani. All rights reserved.</p>
  </div>
</footer>