<?php
$pengiriman = $pengiriman ?? [];
$kendaraans = $kendaraans ?? []; // untuk dropdown kendaraan
$old = $old ?? [];
$errors = $errors ?? [];
$csrf = $csrf ?? '';
$isEdit = ($action === 'update');
$formAction = $isEdit ? BASE_URL.'pengiriman/update/'.$pengiriman['kodepengiriman'] : BASE_URL.'pengiriman/store';
$val = fn($key,$default='') => $old[$key]??($isEdit?$pengiriman[$key]??$default:$default);
?>
<style>
  body { font-family:'Poppins',sans-serif; background:#f0fdf4; color:#065f46; }
  main { padding:2rem; }
  .card-form { background:#fff; border-radius:20px; padding:3rem; box-shadow:0 10px 30px rgba(16,185,129,0.15); transition:0.3s; border:1px solid #e5f7ee; }
  .card-form:hover { box-shadow:0 12px 40px rgba(16,185,129,0.25); }
  .section-header { font-weight:700; font-size:2rem; display:flex; align-items:center; gap:10px; margin-bottom:0.5rem; }
  .divider { height:4px; width:200px; background:linear-gradient(90deg,#16a34a,#4ade80); border-radius:4px; margin-bottom:2rem; }
  .form-label { font-weight:600; color:#065f46; }
  .form-control { border-radius:14px; border:1px solid #d1fae5; padding:0.8rem 1.2rem; width:100%; margin-bottom:1rem; font-size:1rem; }
  .btn-submit { background:linear-gradient(135deg,#16a34a,#22c55e); color:#fff; border:none; border-radius:50px; padding:0.8rem 2.5rem; font-weight:600; transition:0.3s; }
  .btn-submit:hover { transform:translateY(-2px); box-shadow:0 6px 15px rgba(22,163,74,0.3); }
  .btn-cancel { background:#e5e7eb; color:#065f46; border:none; border-radius:50px; padding:0.8rem 2.5rem; font-weight:600; margin-right:1rem; }
</style>

<main>
  <div class="card-form">
    <div class="section-header">
      <i class="fas <?= $isEdit?'fa-edit':'fa-plus-circle' ?> text-success"></i>
      <?= $isEdit?'Edit Pengiriman':'Tambah Pengiriman Baru' ?>
    </div>
    <div class="divider"></div>

    <?php if($errors): ?>
      <div class="alert alert-danger"><ul><?php foreach($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?></ul></div>
    <?php endif; ?>

    <form action="<?= $formAction ?>" method="post" class="row">
      <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf) ?>">

      <div class="col-lg-6">
        <label class="form-label">Kode Pengiriman</label>
        <input type="text" name="kodepengiriman" class="form-control" value="<?= htmlspecialchars($val('kodepengiriman')) ?>" required>
      </div>

      <div class="col-lg-6">
        <label class="form-label">Kendaraan</label>
        <select name="kendaraan" class="form-control" required>
          <option value="">Pilih kendaraan</option>
          <?php foreach($kendaraans as $k): ?>
            <option value="<?= htmlspecialchars($k['kodekendaraan']) ?>" <?= $val('kendaraan')==$k['kodekendaraan']?'selected':'' ?>><?= htmlspecialchars($k['namakendaraan'].' - '.$k['platnomor']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-6">
        <label class="form-label">Tujuan</label>
        <input type="text" name="tujuan" class="form-control" value="<?= htmlspecialchars($val('tujuan')) ?>" required>
      </div>

      <div class="col-lg-6">
        <label class="form-label">Tanggal Pengiriman</label>
        <input type="date" name="tanggal" class="form-control" value="<?= htmlspecialchars($val('tanggal')) ?>" required>
      </div>

      <div class="col-lg-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
          <option value="">Pilih status</option>
          <option value="Pending" <?= $val('status')=='Pending'?'selected':'' ?>>Pending</option>
          <option value="Berjalan" <?= $val('status')=='Berjalan'?'selected':'' ?>>Berjalan</option>
          <option value="Selesai" <?= $val('status')=='Selesai'?'selected':'' ?>>Selesai</option>
        </select>
      </div>

      <div class="col-12 mt-4 d-flex justify-content-end">
        <a href="<?= BASE_URL ?>pengiriman" class="btn-cancel">Kembali</a>
        <button type="submit" class="btn-submit"><?= $isEdit?'Simpan Perubahan':'Simpan' ?></button>
      </div>
    </form>
  </div>
</main>
