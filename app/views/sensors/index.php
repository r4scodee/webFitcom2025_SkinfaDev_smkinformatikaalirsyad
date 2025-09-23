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
          <i class="fas fa-broadcast-tower me-2"></i> Sensors Monitoring
        </h3>
      </div>

      <!-- Actions (right side) -->
      <div class="d-flex align-items-center justify-content-end gap-2 flex-shrink-0 order-1 order-md-2">

        <!-- Weather Widget (desktop only) -->
        <div class="weather-widget d-none d-lg-flex align-items-center me-2">
          <i class="fas fa-sun text-warning me-1"></i>
          <span class="fw-semibold">24°C</span>
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

<main class="container-fluid px-4 py-4">
  <!-- Weather Cards -->
  <div class="row g-4">
    <div class="col-lg-3 col-md-6">
      <div class="stats-card fade-in">
        <div class="stats-icon sensors">
          <i class="fas fa-thermometer-half"></i>
        </div>
        <div class="stats-value" id="temp">-- °C</div>
        <div class="stats-label">Temperature</div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="stats-card fade-in">
        <div class="stats-icon sensors">
          <i class="fas fa-tint"></i>
        </div>
        <div class="stats-value" id="humidity">-- %</div>
        <div class="stats-label">Humidity</div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="stats-card fade-in">
        <div class="stats-icon sensors">
          <i class="fas fa-wind"></i>
        </div>
        <div class="stats-value" id="wind">-- km/h</div>
        <div class="stats-label">Wind Speed</div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6">
      <div class="stats-card fade-in">
        <div class="stats-icon sensors">
          <i class="fas fa-cloud-sun"></i>
        </div>
        <div class="stats-value" id="condition">--</div>
        <div class="stats-label">Condition</div>
      </div>
    </div>
  </div>

  <!-- Charts -->
  <div class="row mt-5">
    <div class="col-lg-6 mb-4">
      <div class="chart-card fade-in">
        <h4 class="chart-title">
          <i class="fas fa-chart-line me-2"></i>
          Temperature Trend
        </h4>
        <canvas id="tempChart" height="120"></canvas>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="chart-card fade-in">
        <h4 class="chart-title">
          <i class="fas fa-tint me-2"></i>
          Humidity Trend
        </h4>
        <canvas id="humidityChart" height="120"></canvas>
      </div>
    </div>
  </div>
</main>
