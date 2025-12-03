<?php 
// Pastikan session sudah start di setiap halaman
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fungsi untuk menandai halaman aktif
function active($path) {
    return ($_SERVER['REQUEST_URI'] === $path) ? 'active' : '';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center" href="<?= $base_url ?>/">
      <img src="<?= $base_url ?>/gambar/logo.png" height="50" class="logo-navbar me-2">
      <span>Buku Tamu</span>
    </a>

    <!-- Button menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- Menu kiri -->
      <ul class="navbar-nav me-auto">
        <?php if(!empty($_SESSION['admin'])): ?>
          <li class="nav-item">
            <a class="nav-link <?= active('/admin/dashboard') ?>" href="<?= $base_url ?>/index.php?url=admin/dashboard">Dashboard</a>
          </li>

          <!-- Dropdown Data -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= 
              active('/admin/daftar-tamu') || active('/admin/kegiatan') ? 'active' : '' 
            ?>" href="#" role="button" data-bs-toggle="dropdown">
              Data
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <?= active('/admin/daftar-tamu') ?>" href="<?= $base_url ?>/index.php?url=admin/daftar-tamu">Data Tamu</a></li>
              <li><a class="dropdown-item <?= active('/admin/kegiatan') ?>" href="<?= $base_url ?>/index.php?url=admin/kegiatan">Kegiatan</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>

      <!-- Menu kanan -->
      <div class="d-flex">
        <?php if(!empty($_SESSION['admin'])): ?>
          <a class="btn btn-outline-light btn-sm me-2" href="<?= $base_url ?>index.php?url=admin/dashboard">Dashboard</a>
          <a class="btn btn-light btn-sm" href="<?= $base_url ?>/logout.php">Logout</a>
        <?php else: ?>
        <a class="btn btn-light btn-sm" href="<?= $base_url ?>index.php?url=/admin/login">Login Admin</a>
        <?php endif; ?>
      </div>

    </div>
  </div>
</nav>
