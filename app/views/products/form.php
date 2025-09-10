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
$val = function($key, $default = '') use ($product, $old, $isEdit) {
    if (!empty($old) && isset($old[$key])) return $old[$key];
    if ($isEdit && !empty($product) && isset($product[$key])) return $product[$key];
    return $default;
};

$isEdit = ($action === 'update');
$formAction = $isEdit ? BASE_URL . 'products/update/' . ($product['id'] ?? '') : BASE_URL . 'products/store';
$val = function($key, $default = '') use ($product, $old, $isEdit) {
    // Prioritas: $old (ketika validasi gagal) > $product (edit) > default
    if (!empty($old) && isset($old[$key])) return $old[$key];
    if ($isEdit && !empty($product) && isset($product[$key])) return $product[$key];
    return $default;
};
?>
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
                <input type="number" name="price" min="0" step="0.01" class="form-control" value="<?= $this->e($val('price', 0)) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Supplier</label>
                <input type="text" name="supplier" class="form-control" value="<?= $this->e($val('supplier')) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar (jpg/png/webp, max 2MB)</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
                <div class="mt-2">
                    <?php $img = $val('image'); ?>
                    <img id="preview" src="<?= $img ? UPLOAD_URL . $this->e($img) : '#' ?>" 
                    alt="preview" 
                    class="img-thumbnail" 
                    style="<?= $img ? 'max-width:220px;' : 'display:none; max-width:220px;' ?>">
                </div>
            </div>

            <div>
                <button class="btn btn-primary"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
                <a href="<?= BASE_URL ?>products" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
