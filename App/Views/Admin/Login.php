<?php require __DIR__ . '/../Layout/Header.php'; ?>
<link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css">
<div class="login-wrapper">

  <div class="left-art">
    <h1>WELCOME</h1>
  </div>

  <?php
// Pastikan sesi dimulai di sini juga, jika tidak dimulai di header atau footer
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Logika Menampilkan Pesan Error Login
if (isset($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; 

// 2. Logika Menampilkan NOTIFIKASI Sesi Habis (Flash Message)
if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-warning" role="alert">
        <?= htmlspecialchars($_SESSION['flash_message']) ?>
    </div>
    <?php
    // HAPUS Sesi setelah ditampilkan agar tidak muncul lagi
    unset($_SESSION['flash_message']); 
endif;
?>
  <!-- Bagian kanan (form login) -->
  <div class="right-login">

    <?php if(!empty($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= $base_url ?>/index.php?url=admin/dologin">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input name="password" type="password" class="form-control" required>
      </div>

      <button class="btn btn-primary">Login</button>
    </form>
  </div>

</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
