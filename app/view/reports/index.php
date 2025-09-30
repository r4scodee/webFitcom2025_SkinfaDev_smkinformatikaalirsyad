
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
          <i class="fas fa-tachometer-alt me-2"></i> Generate Product Report
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
    <div class="mb-3">
        <a href="<?= BASE_URL ?>report/generate" class="btn btn-primary">Generate Report</a>
        <a href="<?= BASE_URL ?>product/exportPdf" class="btn btn-danger">Export PDF</a>
    </div>

    <!-- Tabel Generate Data -->
       <div class="card fade-in shadow-sm border-0">
           <div class="card-body pt-0 pb-4">
               <div class="table-responsive">
                   <table class="table table-hover mb-0 rounded-3 align-middle">
                       <thead>
                           <tr>
                               <th class="px-4 py-3 fs-lg">ID</th>
                               <th class="px-4 py-3 fs-lg">Code</th>
                               <th class="px-4 py-3 fs-lg">Name</th>
                               <th class="px-4 py-3 fs-lg">Price</th>
                               <th class="px-4 py-3 fs-lg">Unit</th>
                               <th class="px-4 py-3 fs-lg">Created At</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php if (!empty($products)): ?>
                               <?php foreach ($products as $p): ?>
                                   <tr class="align-middle">
                                       <td class="px-4 py-3 fw-medium"><?= $this->e($p['id']) ?></td>
                                       <td class="px-4 py-3 fw-medium"><?= $this->e($p['code']) ?></td>
                                       <td class="px-4 py-3 fw-medium"><?= $this->e($p['name']) ?></td>
                                       <td class="px-4 py-3 fw-medium">Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                                       <td class="px-4 py-3 fw-medium"><?= $this->e($p['unit']) ?></td>
                                       <td class="px-4 py-3 fw-medium"><?= $this->e($p['created_at']) ?></td>
                                   </tr>
                               <?php endforeach ?>
                           <?php else: ?>
                               <tr>
                                   <td colspan="6" class="text-center">No data available</td>
                               </tr>
                           <?php endif ?>
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
</main>
