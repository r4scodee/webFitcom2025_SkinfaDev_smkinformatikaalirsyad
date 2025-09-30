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
          <i class="fas fa-tags me-2"></i> Generate Product Report
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

        <div class="dropdown nxl-h-item">
          <a id="notifBtn" class="nxl-head-link me-3" href="javascript:void(0);">
            <i class="fas fa-bell"></i>
            <span id="notifBadge" class="badge bg-danger nxl-h-badge">3</span>
          </a>

          <div id="notifDropdown" class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
            <div class="d-flex justify-content-between align-items-center notifications-head">
              <h6 class="fw-bold text-dark mb-0">Notifikasi</h6>

            </div>

            <div class="notifications-item">
              <div class="notif-icon me-3 bg-warning text-white">
                <i class="fas fa-thermometer-half"></i>
              </div>
              <div class="notifications-desc">
                <span class="font-body text-truncate-2-line">
                  <span class="fw-semibold text-dark">Sensor Suhu</span> Suhu greenhouse naik jadi <b>32°C</b>.
                </span>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="notifications-date text-muted">2 menit yang lalu</div>
                  <div class="d-flex align-items-center gap-2">

                    <a href="javascript:void(0);" class="remove text-danger" title="Hapus">
                      <i class="fas fa-times fs-12"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="notifications-item">
              <div class="notif-icon me-3 bg-info text-white">
                <i class="fas fa-tint"></i>
              </div>
              <div class="notifications-desc">
                <span class="font-body text-truncate-2-line">
                  <span class="fw-semibold text-dark">Irigasi</span> Penyiraman otomatis selesai di <b>lahan sayur</b>.
                </span>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="notifications-date text-muted">20 menit yang lalu</div>
                  <div class="d-flex align-items-center gap-2">

                    <a href="javascript:void(0);" class="remove text-danger" title="Hapus">
                      <i class="fas fa-times fs-12"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="notifications-item">
              <div class="notif-icon me-3 bg-success text-white">
                <i class="fas fa-apple-alt"></i>
              </div>
              <div class="notifications-desc">
                <span class="font-body text-truncate-2-line">
                  <span class="fw-semibold text-dark">Panen Buah</span> 25kg <b>tomat segar</b> siap dipanen hari ini.
                </span>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="notifications-date text-muted">1 jam yang lalu</div>
                  <div class="d-flex align-items-center gap-2">

                    <a href="javascript:void(0);" class="remove text-danger" title="Hapus">
                      <i class="fas fa-times fs-12"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <style>
          .nxl-h-item {
            position: relative;
          }

          .nxl-head-link {
            display: flex;
            align-items: center;
            position: relative;
            font-size: 20px;
            color: #444;
            text-decoration: none;
            cursor: pointer;
          }

          .nxl-h-badge {
            font-size: 11px;
            position: absolute;
            top: -5px;
            right: -5px;
            padding: 3px 6px;
            border-radius: 50%;
          }

          .nxl-h-dropdown {
            width: 350px !important;
            max-height: 400px !important;
            overflow-y: auto;
            border-radius: 14px;
            padding: 1.5rem 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.11);
            background: #fff;
            border: 1px solid #e0e0e0;
          }

          .notifications-head {
            border-bottom: 1px solid #eee;
            padding: 0.5rem 0.8rem;
            margin-bottom: 0.5rem;
          }

          .notifications-item {
            display: flex;
            align-items: flex-start;
            padding: 0.7rem;
            border-radius: 8px;
            transition: background 0.2s;

          }

          .notifications-item:hover {
            background: #f8f9fa;
          }

          .notif-icon {
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
          }

          .notifications-desc {
            flex: 1;
            font-size: 13px;
          }

          .notifications-date {
            font-size: 11px;
          }

          .mark-read {
            cursor: pointer;
          }

          .remove {
            cursor: pointer;
          }
        </style>


        <!-- ========== JS ========== -->
        <script>
          const notifBtn = document.getElementById("notifBtn");
          const notifDropdown = document.getElementById("notifDropdown");
          const notifBadge = document.getElementById("notifBadge");
          const markAllRead = document.getElementById("markAllRead");

          // Toggle by click
          notifBtn.addEventListener("click", () => {
            notifDropdown.classList.toggle("show");
            notifDropdown.style.position = "absolute";
            notifDropdown.style.inset = "0 auto auto 0";
            notifDropdown.style.transform = "translate3d(-250px, 40px, 0)";
          });

          // Hover open
          notifBtn.addEventListener("mouseenter", () => {
            notifDropdown.classList.add("show");
            notifDropdown.style.position = "absolute";
            notifDropdown.style.inset = "0 auto auto 0";
            notifDropdown.style.transform = "translate3d(-250px, 40px, 0)";
          });

          // Close when leave
          notifDropdown.addEventListener("mouseleave", () => {
            notifDropdown.classList.remove("show");
          });

          // Remove notif item
          document.querySelectorAll(".remove").forEach(btn => {
            btn.addEventListener("click", (e) => {
              e.target.closest(".notifications-item").remove();
              updateBadge();
            });
          });

          // Mark single as read
          document.querySelectorAll(".mark-read").forEach(btn => {
            btn.addEventListener("click", () => {
              btn.style.background = "#28a745";
              updateBadge();
            });
          });

          // Mark all as read
          markAllRead.addEventListener("click", () => {
            document.querySelectorAll(".mark-read").forEach(btn => {
              btn.style.background = "#28a745";
            });
            notifBadge.style.display = "none";
          });

          // Update badge count
          function updateBadge() {
            const items = document.querySelectorAll(".notifications-item");
            const count = items.length;
            notifBadge.textContent = count;
            if (count === 0) {
              notifBadge.style.display = "none";
            }
          }
        </script>

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
              <a class="dropdown-item" href="<?= BASE_URL ?>errors">
                <i class="fas fa-user me-2 text-muted"></i>Profile Settings
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="<?= BASE_URL ?>product/exportPdf">
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
  <div class="d-flex gap-2 mb-3">
    <a href="<?= BASE_URL ?>report/generate" class="btn btn-primary d-flex align-items-center">
      <i class="fas fa-file-alt me-2"></i> Generate Report
    </a>
    <a href="<?= BASE_URL ?>product/exportPdf" class="btn btn-danger d-flex align-items-center">
      <i class="fas fa-file-pdf me-2"></i> Export PDF
    </a>
  </div>
  <style>
    .btn {
      border-radius: 10px;
      padding: 10px 18px;
      transition: all 0.2s ease-in-out;
      font-weight: 500;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
  </style>

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