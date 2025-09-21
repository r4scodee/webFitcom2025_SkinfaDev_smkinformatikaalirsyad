<?php ob_start(); ?>
<!-- Header -->
<header class="header bg-light py-3">
  <div class="header-content d-flex align-items-center">
    <div class="d-flex justify-content-start">

      <button class="btn btn-farm d-md-none me-2 ms-2" id="sidebarToggle">
        <i class="fas fa-bars fa-lg"></i>
      </button>

      <h1 class="page-title d-none d-md-block m-0" id="pageTitle">
        Dashboard Overview
      </h1>
    </div>

    <div class="user-info d-none d-md-flex align-items-center">
      <span class="text-muted me-2">Admin</span>
      <div class="user-avatar">
        <img src="<?= BASE_URL ?>asset/img/admin.jpeg" alt="Admin Photo">
      </div>
    </div>
  </div>
</header>

<!-- Dashboard Content -->
<div class="dashboard-content">
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
</div>

<!-- Footer -->
<footer class="bg-light text-dark py-4 mt-5 footer-dashboard">
  <div class="container">
    <p class="mb-1">Copyrights &copy; <?= date('Y') ?> Skinfa Bertani. All rights reserved.</p>
  </div>
</footer>