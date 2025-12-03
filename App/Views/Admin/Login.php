<?php require __DIR__ . '/../Layout/Header.php'; ?>
<link rel="stylesheet" href="<?= $base_url ?>/public/css/style.css">
<div class="login-wrapper">

    <div class="left-art">
        <h1>WELCOME</h1>
    </div>
    
    <div class="right-login">

        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="alert alert-warning" role="alert">
                <?= htmlspecialchars($_SESSION['flash_message']) ?>
            </div>
            <?php unset($_SESSION['flash_message']); ?>
        <?php endif; ?>

        <?php if(isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
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