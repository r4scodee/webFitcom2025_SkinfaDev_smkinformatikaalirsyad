<?php ob_start(); ?>
<!-- Header -->
<header class="header">
  <div class="header-content">
    <div class="d-flex align-items-center">
      <button class="btn btn-link d-md-none me-3" id="sidebarToggle">
        <i class="fas fa-bars"></i>
      </button>
      <h1 class="page-title" id="pageTitle">Dashboard Overview</h1>
    </div>
    <div class="user-info">
      <span class="text-muted me-2">Admin</span>
      <div class="user-avatar">
        <i class="fas fa-user"></i>
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
