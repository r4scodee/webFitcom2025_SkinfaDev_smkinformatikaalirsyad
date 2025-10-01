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
              <a class="dropdown-item text-danger" href="<?= BASE_URL ?>logout.php">
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

  <!-- Tabel Generate Data -->
  <div class="card fade-in shadow-sm border-0">
    <div class="card-body pt-0 pb-4">
      <div class="table-responsive">
        <table class="table table-hover mb-0 rounded-3 align-middle">
          <thead>
            <tr>
              <th class="px-4 py-3 fs-lg">ID</th>
              <th class="px-4 py-3 fs-lg">Kode</th>
              <th class="px-4 py-3 fs-lg">Nama</th>
              <th class="px-4 py-3 fs-lg">Harga</th>
              <th class="px-4 py-3 fs-lg">Satuan</th>
              <th class="px-4 py-3 fs-lg">Tanggal</th>
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
                <td colspan="6" class="text-center">Generate Data Untuk Melihat</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>


<button id="chat-toggle" aria-label="Buka chat"><i class="fas fa-comments"></i></button>
<div id="chatbot">
  <div class="center">
    <div class="chat">
      <div class="contact bar">
        <div class="pic"><img src="assets/img/chatbot/chatbot.png" alt="Chat"></div>
        <div class="name">Tanya Support Dashboard AI</div>
        <div class="seen">Online</div>
      </div>
      <div class="messages" id="chat-messages">
        <div class="time" id="time-display"></div>
      </div>
      <div class="suggested-chips-wrapper">
        <div class="suggested-chips" id="suggested-chips"><span class="chip">📊 Bagaimana cara melihat
            laporan?</span><span class="chip">➕ Bagaimana tambah data baru?</span><span class="chip">📝 Bagaimana cara
            edit data?</span><span class="chip">🗑️ Bagaimana hapus data?</span><span class="chip">📊 Bagaimana cara
            melihat chart?</span><span class="chip">🛒 Bagaimana cara membuat produk?</span><span
            class="chip wa-chip"><a
              href="https://wa.me/6287877566677?text=Halo%20Admin%20Support,%20saya%20mau%20bertanya%20karena%20chatbot%20belum%20menjawab"
              target="_blank"><i class="fab fa-whatsapp"></i> Pertanyaanmu belum terjawab? Klik disini</a></span></div>
      </div>
      <div class="input"><i class="far fa-laugh-beam"></i><input type="text" id="input-field"
          placeholder="Ketik Pertanyaan Disini..." /><button id="send-btn" aria-label="Kirim"><i
            class="fas fa-paper-plane"></i></button><i class="fas fa-microphone"></i><emoji-picker></emoji-picker></div>
    </div>
  </div>
</div>