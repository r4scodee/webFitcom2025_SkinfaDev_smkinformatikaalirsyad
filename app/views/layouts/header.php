<?php
// header.php - layout header & include Bootstrap + jQuery dari CDN (bisa disesuaikan)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Produk - Simple OOP</title>
    <!-- Bootstrap 5.3 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* sedikit styling supaya tampil rapi */
        .thumb { max-width: 120px; max-height: 80px; object-fit: cover; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= BASE_URL ?>products">My Products</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>products/create">Tambah Produk</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container mt-4">
