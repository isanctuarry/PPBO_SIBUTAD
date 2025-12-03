<?php
$host = $_SERVER['HTTP_HOST'];

if (strpos($host, 'localhost') !== false) {
  $base_url = 'http://' . $host;
} else {
  $base_url = 'https://' . $host;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?? 'SIBUTAD' ?></title>

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- LOAD CSS FIX -->
  <link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css?v=2">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#2d3250;">
  <div class="container">

    <!-- LOGO DI POJOK KIRI ATAS -->
    <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>/index.php">
        <img src="<?= $base_url ?>app/public/gambar/logo.png" 
             style="height:40px; width:auto; margin-right:10px;">
        SIBUTAD
    </a>

    <?php if(isset($_SESSION['admin'])): ?>
      <div class="ms-auto">
        <a class="btn btn-outline-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/dashboard">Dashboard</a>
        <a class="btn btn-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/laporan">Laporan</a>
        <a class="btn btn-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/logout">Logout</a>
      </div>
    <?php else: ?>
      <div class="ms-auto">
        <a class="btn btn-outline-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/login">Login Admin</a>
        <a class="btn btn-light btn-sm" href="<?= $base_url ?>/index.php?url=tamu/daftar">Daftar Kunjungan</a>
      </div>
    <?php endif;?>

  </div>
</nav>

<div class="container my-4">
