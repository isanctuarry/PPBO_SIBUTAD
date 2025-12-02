<?php require __DIR__ . '/../Layout/Header.php'; ?>
<link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css">
<div class="login-wrapper">

  <div class="left-art">
    <h1>WELCOME</h1>
  </div>

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
