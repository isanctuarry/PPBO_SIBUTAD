<?php
$host = $_SERVER['HTTP_HOST'];

// FIX: BASE URL untuk localhost dan hosting/Vercel
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

  <!-- FIX: PAKSA LOAD STYLE.CSS -->
  <link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css?v=<?= time() ?>">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #2d3250;">
  <div class="container">

    <!-- FIX: TAMBAHKAN LOGO -->
    <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>/index.php">
        <img src="<?= $base_url ?>/public/gambar/logo.png" 
             alt="Logo" 
             style="height:35px; margin-right:10px;">
        <span>SIBUTAD</span>
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
    <?php endif; ?>

  </div>
</nav>

<div class="container my-4">
