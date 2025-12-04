<?php require __DIR__ . '/../Layout/Header.php'; ?>

<div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        &larr; Kembali
    </button>
</div>

<h4>Manajemen Kegiatan</h4>

<!-- Pesan sukses otomatis hilang -->
<?php if(isset($_SESSION['success'])): ?>
    <div id="success-alert" class="alert alert-success text-center">
        <?= $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<!-- FORM INPUT -->
<div class="card p-3 mb-4">
    <form method="post" action="index.php?url=kegiatan/simpan">
        <div class="mb-2">
            <label>Nama Kegiatan</label>
            <input name="nama_kegiatan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tanggal_kegiatan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Lokasi (opsional)</label>
            <input name="lokasi" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- TABEL -->
<div class="card p-3">
    <h5 class="mb-3">Daftar Kegiatan</h5>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th style="width: 140px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($kegiatan)): ?>
                <tr>
                    <td colspan="5" class="text-center">Belum ada data.</td>
                </tr>
            <?php else: ?>
                <?php foreach($kegiatan as $i => $k): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= htmlspecialchars($k['nama_kegiatan']) ?></td>
                    <td><?= htmlspecialchars($k['lokasi'] ?? '-') ?></td>
                    <td><?= date('d-m-Y', strtotime($k['tanggal_kegiatan'])) ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary"
                           href="index.php?url=kegiatan/edit/<?= $k['id_kegiatan'] ?>"
                           title="Edit">
                           <i class="bi bi-pencil-square"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" 
                           href="index.php?url=kegiatan/hapus/<?= $k['id_kegiatan'] ?>" 
                           onclick="return confirm('Yakin ingin menghapus?')"
                           title="Hapus">
                           <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Script untuk menghilangkan alert otomatis -->
<script>
    const alertBox = document.getElementById('success-alert');
    if(alertBox){
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000); // 3000ms = 3 detik
    }
</script>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
