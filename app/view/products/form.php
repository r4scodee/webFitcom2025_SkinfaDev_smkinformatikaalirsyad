<?php
$product = $product ?? [];
$old = $old ?? []; 
$errors = $errors ?? []; 
$csrf = $csrf ?? ''; 

$isEdit = ($action === 'update');

$formAction = $isEdit
  ? BASE_URL . 'product/update/' . ($product['id'] ?? '')
  : BASE_URL . 'product/store'; 

$val = function ($key, $default = '') use ($product, $old, $isEdit) {
  if (!empty($old) && isset($old[$key]))
    return $old[$key]; 
  if ($isEdit && !empty($product) && isset($product[$key]))
    return $product[$key];
  return $default;
};
?>


<style>
  body {
    background: linear-gradient(120deg, #f0fdf4, #dcfce7);
    font-family: 'Poppins', sans-serif;
  }

  main {
    min-height: 100vh;
  }

  .card-farm {
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(16, 185, 129, 0.15);
    padding: 3rem;
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
  }

  .card-farm:hover {
    box-shadow: 0 12px 40px rgba(16, 185, 129, 0.25);
  }

  .section-header {
    font-weight: 700;
    font-size: 2rem;
    color: #065f46;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .divider {
    height: 4px;
    width: 220px;
    background: linear-gradient(90deg, #16a34a, #4ade80);
    border-radius: 4px;
    margin-top: 0.5rem;
    margin-bottom: 2.5rem;
  }

  .form-label {
    font-weight: 600;
    color: #065f46;
  }

  .form-control,
  .form-select {
    border-radius: 14px;
    border: 1px solid #d1fae5;
    padding: 0.9rem 1.2rem;
    font-size: 1rem;
    transition: all 0.3s ease;
  }

  .form-control:focus,
  .form-select:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.25);
  }

  .btn-farm {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    border-radius: 50px;
    padding: 0.9rem 2.5rem;
    transition: all 0.3s ease;
    border: none;
  }

  .btn-farm:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(22, 163, 74, 0.3);
  }

  #preview {
    max-width: 300px;
    border-radius: 12px;
    border: 2px solid #d1fae5;
    margin-top: 1rem;
    transition: all 0.3s ease;
  }

  #preview:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
  }

  .alert-danger {
    background-color: #fee2e2;
    color: #991b1b;
    border: none;
    border-radius: 12px;
    padding: 1rem 1.2rem;
  }

  @media (max-width: 1200px) {
    .card-farm {
      padding: 2.5rem;
    }
  }

  @media (max-width: 992px) {
    .section-header {
      font-size: 1.6rem;
    }

    .card-farm {
      padding: 2rem;
    }

    #preview {
      max-width: 250px;
    }
  }

  @media (max-width: 768px) {
    .card-farm {
      padding: 1.8rem;
      border-radius: 14px;
    }

    .btn-farm,
    .btn-outline-secondary {
      width: 100%;
      text-align: center;
    }

    #preview {
      max-width: 220px;
    }
  }

  @media (max-width: 576px) {
    main {
      padding: 1rem !important;
    }

    .section-header {
      font-size: 1.4rem;
    }

    .divider {
      width: 150px;
    }

    .form-control,
    .form-select {
      font-size: 0.95rem;
      padding: 0.8rem 1rem;
    }

    #preview {
      width: 100%;
      max-width: 100%;
      margin-top: 0.8rem;
    }
  }
</style>

<main class="container-fluid px-5 py-5">
  <div class="card-farm w-100">
    <div class="section-header mb-0">
      <i class="fas <?= $isEdit ? 'fa-edit' : 'fa-plus-circle' ?> text-success"></i>
      <?= $isEdit ? 'Edit Produk' : 'Tambah Produk Baru' ?>
    </div>
    <div class="divider"></div>

    <?php if (!empty($errors)): ?>
      <div class="alert alert-danger shadow-sm">
        <ul class="mb-0">
          <?php foreach ($errors as $err): ?>
            <li><?= $this->e($err) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data" class="row g-4 mt-2" novalidate>
      <input type="hidden" name="_csrf" value="<?= $this->e($csrf) ?>">

      <div class="col-lg-6 col-md-6">
        <label class="form-label">Kode Produk <span class="text-danger">*</span></label>
        <input type="text" name="kode" class="form-control" placeholder="Contoh: PRD-001"
          value="<?= $this->e($val('kode')) ?>" required>
      </div>

      <div class="col-lg-6 col-md-6">
        <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk"
          value="<?= $this->e($val('nama')) ?>" required>
      </div>

      <div class="col-lg-6 col-md-6">
        <label class="form-label">Harga</label>
        <input type="number" name="harga" id="harga" class="form-control" placeholder="Rp 0"
          value="<?= $this->e($val('harga')) ?>">
      </div>

      <div class="col-lg-6 col-md-6">
        <label class="form-label">Satuan</label>
        <select name="satuan" class="form-select">
          <option value="">Pilih satuan</option>
          <option value="pcs" <?= $val('satuan') == 'pcs' ? 'selected' : '' ?>>pcs</option>
          <option value="g" <?= $val('satuan') == 'g' ? 'selected' : '' ?>>gram (g)</option>
          <option value="kg" <?= $val('satuan') == 'kg' ? 'selected' : '' ?>>kilogram (kg)</option>
          <option value="ton" <?= $val('satuan') == 'ton' ? 'selected' : '' ?>>ton</option>
        </select>
      </div>

      <div class="col-12">
        <label class="form-label">Gambar Produk <small class="text-muted">(jpg/png/webp, maks 2MB)</small></label>
        <input type="file" name="image" id="image" accept="image/*" class="form-control mt-2 w-300">
        <?php $img = $val('image'); ?>
        <img id="preview" src="<?= $img ? UPLOAD_URL . $this->e($img) : '#' ?>" alt="preview"
          style="<?= $img ? '' : 'display:none;' ?>">
      </div>

      <div class="col-12 d-flex flex-wrap justify-content-end gap-3 mt-5">
        <a href="<?= BASE_URL ?>" class="btn btn-outline-secondary px-5 py-2 rounded-pill fw-semibold">
          <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>

        <button type="submit" class="btn btn-farm px-5 py-2 rounded-pill fw-semibold">
          <i class="fas <?= $isEdit ? 'fa-save' : 'fa-check-circle' ?> me-2"></i>
          <?= $isEdit ? 'Simpan' : 'Simpan' ?>
        </button>
      </div>
    </form>
  </div>
</main>


<script>
  const imageInput = document.getElementById('image');
  const preview = document.getElementById('preview');

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      preview.style.display = 'block';
      preview.src = URL.createObjectURL(file);
    }
  });
</script>