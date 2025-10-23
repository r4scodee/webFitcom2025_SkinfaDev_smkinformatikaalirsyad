<?php ob_start(); ?>
<style>
  body { font-family:'Inter',sans-serif; background:#f0fdf4; color:#065f46; }
  main { padding:2rem; }
  .card-pengiriman { background:#fff; border-radius:1.25rem; box-shadow:0 6px 20px rgba(0,0,0,0.07); transition:all 0.3s ease; }
  .card-pengiriman:hover { transform:translateY(-6px); box-shadow:0 12px 32px rgba(0,0,0,0.12); }
  .card-header { font-weight:700; font-size:1.25rem; padding:1rem 1.5rem; border-bottom:1px solid #d1fae5; display:flex; justify-content:space-between; align-items:center; }
  .btn-add { background:linear-gradient(135deg,#16a34a,#22c55e); color:#fff; border:none; border-radius:50px; padding:0.5rem 1.5rem; font-weight:600; transition:0.3s; }
  .btn-add:hover { transform:translateY(-2px); box-shadow:0 6px 15px rgba(22,163,74,0.3); }
  table { width:100%; border-collapse:collapse; margin-top:1rem; }
  th, td { padding:0.8rem 1rem; text-align:left; border-bottom:1px solid #e5f3eb; }
  th { background:#e6f4ea; }
  tr:hover { background:#d1fae5; }
  .action-btn { border:none; background:none; cursor:pointer; font-size:1rem; margin-right:0.5rem; color:#065f46; }
  .action-btn.delete { color:#dc2626; }
</style>

<main>
  <div class="card-pengiriman">
    <div class="card-header">
      <span>Daftar Pengiriman</span>
      <a href="<?= BASE_URL ?>pengiriman/create" class="btn-add"><i class="fas fa-plus-circle me-1"></i> Tambah Pengiriman</a>
    </div>
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Kode Pengiriman</th>
            <th>Kendaraan</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($pengirimans as $p): ?>
          <tr>
            <td><?= htmlspecialchars($p['kodepengiriman']) ?></td>
            <td><?= htmlspecialchars($p['kendaraan']) ?></td>
            <td><?= htmlspecialchars($p['tujuan']) ?></td>
            <td><?= htmlspecialchars($p['tanggal']) ?></td>
            <td><?= htmlspecialchars($p['status']) ?></td>
            <td>
              <a href="<?= BASE_URL ?>pengiriman/edit/<?= $p['kodepengiriman'] ?>" class="action-btn"><i class="fas fa-edit"></i></a>
              <form action="<?= BASE_URL ?>pengiriman/delete/<?= $p['kodepengiriman'] ?>" method="post" style="display:inline;">
                <input type="hidden" name="_csrf" value="<?= $csrf ?>">
                <button class="action-btn delete" onclick="return confirm('Hapus pengiriman ini?')"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php if(empty($pengirimans)): ?>
            <tr><td colspan="6" class="text-center text-muted">Belum ada data pengiriman.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
