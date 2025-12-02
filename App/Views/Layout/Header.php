<?php
$host = $_SERVER['HTTP_HOST'];

if (strpos($host, 'localhost') !== false) {
  $base_url = 'http://' . $host;
} else {
  $base_url = 'https://' . $host . '/';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?? 'SIBUTAD' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Tentukan apakah halaman ini adalah halaman publik (yang tidak perlu tombol back)
$current_url = $_GET['url'] ?? 'home';
$is_public_page = in_array($current_url, ['tamu', 'tamu/index', 'admin/login', 'admin/dologin']);

// Tampilkan tombol hanya jika bukan halaman publik utama
if (!$is_public_page && strpos($current_url, 'admin') !== false):
?>
<div style="margin-bottom: 20px;">
    <button onclick="history.back()" class="btn btn-sm btn-outline-secondary" title="Kembali ke halaman sebelumnya">
        <i class="fas fa-arrow-left"></i> Kembali
    </button>
</div>
<?php 
endif; 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="<?= $base_url ?>/index.php">SIBUTAD</a>
    
    <?php if(isset($_SESSION['admin'])): ?>
      <div class="ms-auto">
        <a class="btn btn-outline-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/dashboard">Dashboard</a>
        <a class="btn btn-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/logout">Logout</a>
      </div>
    <?php else: ?>
      <div class="ms-auto">
        <a class="btn btn-outline-light btn-sm" href="<?= $base_url ?>/index.php?url=admin/login">Login Admin</a>
      </div>
    <?php endif;?>
  </div>
</nav>
<div class="container my-4">