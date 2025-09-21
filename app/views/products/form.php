<?php
// products/form.php
// Variables available:
// - action: 'store' or 'update'
// - csrf: token
// - errors: array errors (optional)
// - old: old input (optional) when validation failed
// - product: product data when edit

// Safety defaults biar tidak muncul warning
$product = $product ?? [];
$old = $old ?? [];
$errors = $errors ?? [];
$csrf = $csrf ?? '';

// Detect apakah edit atau create
$isEdit = ($action === 'update');
$formAction = $isEdit
    ? BASE_URL . 'products/update/' . ($product['id'] ?? '')
    : BASE_URL . 'products/store';

// Helper untuk ambil value lama
$val = function ($key, $default = '') use ($product, $old, $isEdit) {
    if (!empty($old) && isset($old[$key]))
        return $old[$key];
    if ($isEdit && !empty($product) && isset($product[$key]))
        return $product[$key];
    return $default;
};

$isEdit = ($action === 'update');
$formAction = $isEdit ? BASE_URL . 'products/update/' . ($product['id'] ?? '') : BASE_URL . 'products/store';
$val = function ($key, $default = '') use ($product, $old, $isEdit) {
    // Prioritas: $old (ketika validasi gagal) > $product (edit) > default
    if (!empty($old) && isset($old[$key]))
        return $old[$key];
    if ($isEdit && !empty($product) && isset($product[$key]))
        return $product[$key];
    return $default;
};
?>
<main class="container-fluid px-4 py-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $isEdit ? 'Edit Produk' : 'Tambah Produk' ?></h5>
    
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $err): ?>
                            <li><?= $this->e($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
    
            <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data" novalidate>
                <input type="hidden" name="_csrf" value="<?= $this->e($csrf) ?>">
                <div class="mb-3">
                    <label class="form-label">Kode Produk <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" required value="<?= $this->e($val('code')) ?>">
                    <div class="form-text">Gunakan kode unik, misal PRD-001</div>
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required value="<?= $this->e($val('name')) ?>">
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Harga (angka)</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="0">
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Satuan</label>
                    <select name="unit" class="form-control">
                        <option value="pcs" <?= $val('unit') == 'pcs' ? 'selected' : '' ?>>pcs</option>
                        <option value="g" <?= $val('unit') == 'g' ? 'selected' : '' ?>>g</option>
                        <option value="kg" <?= $val('unit') == 'kg' ? 'selected' : '' ?>>kg</option>
                        <option value="ton" <?= $val('unit') == 'ton' ? 'selected' : '' ?>>ton</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Gambar (jpg/png/webp, max 2MB)</label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control">
                    <div class="mt-2">
                        <?php $img = $val('image'); ?>
                        <img id="preview" src="<?= $img ? UPLOAD_URL . $this->e($img) : '#' ?>" alt="preview"
                            class="img-thumbnail"
                            style="<?= $img ? 'max-width:220px;' : 'display:none; max-width:220px;' ?>">
                    </div>
                </div>
    
                <div>
                    <button class="btn btn-farm"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
                    <a href="<?= BASE_URL ?>products" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</main>
<script>
    // Fungsi format ke Rupiah
    function formatRupiah(angka, prefix = "Rp ") {
        let number_string = angka.replace(/[^,\d]/g, ""), // hapus non-digit
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika ribuan ada
        if (ribuan) {
            let separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        // tambahkan koma jika ada pecahan
        rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
        return prefix + rupiah;
    }

    $(document).ready(function () {
        // Format input saat user ketik
        $("#price").on("input", function () {
            let nilai = $(this).val();
            $(this).val(formatRupiah(nilai));
        });

        // Bersihkan "Rp" & titik sebelum ke DB
        $("form").on("submit", function () {
            let harga = $("#price").val().replace(/[^0-9]/g, "");
            $("#price").val(harga);
        });
    });
</script>