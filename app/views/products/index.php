<?php ob_start(); ?>
<h3 class="mb-4">Table Produk</h3>

<div class="row mb-3">
  <div class="col-md-4">
    <input type="text" id="searchProduct" class="form-control" placeholder="Cari produk...">
  </div>
  <div class="col-md-3">
    <select id="filterSupplier" class="form-select">
      <option value="">Semua Supplier</option>
      <?php
      $suppliers = array_unique(array_column($products, 'supplier'));
      foreach ($suppliers as $s): ?>
        <option value="<?= strtolower($s) ?>"><?= htmlspecialchars($s) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="col-md-2 ms-auto text-end">
    <a href="<?= BASE_URL ?>products/create" class="btn btn-success">
      <i class="bi bi-plus-circle"></i> Tambah
    </a>
  </div>
</div>

<?php if (empty($products)): ?>
  <div class="alert alert-info">Belum ada produk.</div>
<?php else: ?>
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-success">
        <tr>
          <th>#</th>
          <th>Kode</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Supplier</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="productTable">
        <?php $no = 1;
        foreach ($products as $p): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $this->e($p['code']) ?></td>
            <td><?= $this->e($p['name']) ?></td>
            <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
            <td><?= $this->e($p['supplier']) ?></td>
            <td>
              <?php if (!empty($p['image'])): ?>
                <img src="<?= UPLOAD_URL . htmlspecialchars($p['image']) ?>" alt="img" class="thumb img-thumbnail" width="60">
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
            <td style="white-space:nowrap">
              <a href="<?= BASE_URL ?>products/edit/<?= htmlspecialchars($p['id']) ?>" class="btn btn-sm btn-warning me-1">
                <i class="bi bi-pencil"></i>
              </a>
              <form method="post" action="<?= BASE_URL ?>products/delete/<?= htmlspecialchars($p['id']) ?>"
                style="display:inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                <input type="hidden" name="_csrf" value="<?= $this->generateCSRFToken() ?>">
                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>
<?php endif; ?>

<script>
  function filterTable() {
    var searchVal = $("#searchProduct").val().toLowerCase();
    var supplierVal = $("#filterSupplier").val().toLowerCase();

    $("#productTable tr").filter(function () {
      var text = $(this).text().toLowerCase();
      var supplier = $(this).find("td:nth-child(5)").text().toLowerCase(); // kolom ke-5 supplier

      var matchSearch = text.indexOf(searchVal) > -1;
      var matchSupplier = !supplierVal || supplier === supplierVal;

      $(this).toggle(matchSearch && matchSupplier);
    });
  }

  $("#searchProduct").on("keyup", filterTable);
  $("#filterSupplier").on("change", filterTable);
</script>