<?php require __DIR__ . '/../Layout/Header.php'; ?>

<h3 class="mb-4">Dashboard</h3>

<!-- ======================================================= -->
<!-- BAGIAN 1: 3 SECTION UTAMA (Akses Cepat/Navigasi) -->
<!-- ======================================================= -->
<div class="row mb-4">
    <!-- 1. Kelola Kegiatan -->
    <div class="col-md-4 mb-3">
        <div class="card card-hover shadow-lg">
            <a href="<?= $base_url ?>/index.php?url=kegiatan" class="card-body p-4 text-decoration-none text-center">
                <i class="fas fa-calendar-alt fa-3x mb-3 text-dark-sibutad"></i>
                <h5 class="card-title text-dark-sibutad font-weight-bold">KELOLA KEGIATAN</h5>
            </a>
        </div>
    </div>

    <!-- 2. Daftar Tamu -->
    <div class="col-md-4 mb-3">
        <div class="card card-hover shadow-lg">
            <a href="<?= $base_url ?>/index.php?url=tamu/daftar" class="card-body p-4 text-decoration-none text-center">
                <i class="fas fa-users fa-3x mb-3 text-dark-sibutad"></i>
                <h5 class="card-title text-dark-sibutad font-weight-bold">DAFTAR TAMU</h5>
            </a>
        </div>
    </div>

    <!-- 3. Rekap Laporan -->
    <div class="col-md-4 mb-3">
        <div class="card card-hover shadow-lg">
            <a href="index.php?url=laporan/rekap" class="card-body p-4 text-decoration-none text-center">
                <i class="fas fa-chart-bar fa-3x mb-3 text-dark-sibutad"></i>
                <h5 class="card-title text-dark-sibutad font-weight-bold">REKAP LAPORAN</h5>
            </a>
        </div>
    </div>
</div>

<!-- ======================================================= -->
<!-- BAGIAN 2: 2 SECTION STATISTIK (Total) -->
<!-- ======================================================= -->
<div class="row mt-4">
    <!-- 1. Total Tamu -->
   <div class="col-md-4 mb-3">
        <div class="card card-hover shadow-lg">
            <a href="index.php?url=laporan/rekap" class="card-body p-4 text-decoration-none text-center">
                <i class="fas fa-chart-bar fa-3x mb-3 text-dark-sibutad"></i>
                <h5 class="card-title text-dark-sibutad font-weight-bold">Total Tamu</h5>
                <h1 class="display-4 font-weight-bold"><?= $stat['total_tamu'] ?? 0 ?></h1>
            </a>
        </div>
    </div>
</div>

    <!-- 2. Total Kegiatan -->
    <div class="col-md-4 mb-3">
        <div class="card card-hover shadow-lg">
            <a href="index.php?url=laporan/rekap" class="card-body p-4 text-decoration-none text-center">
                <i class="fas fa-chart-bar fa-3x mb-3 text-dark-sibutad"></i>
                <h5 class="card-title text-dark-sibutad font-weight-bold">Total Tamu</h5>
                <h1 class="display-4 font-weight-bold"><?= $stat['total_kegiatan'] ?? 0 ?></h1>
            </a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
