<?php require __DIR__ . '/../Layout/Header.php'; ?>

<!-- TABEL -->
 <div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        &larr; Kembali
    </button>
</div>

<div class="card p-3">
    <h5 class="mb-3">Daftar Tamu</h5>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tanggal Kunjungan</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($tamu)): ?>
                <tr>
                    <td colspan="4" class="text-center">Belum ada data.</td>
                </tr>
            <?php else: ?>
                <?php foreach($tamu as $i => $column): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= htmlspecialchars($column['nama']) ?></td>
                    <td><?= htmlspecialchars($column['tanggal_kunjungan']) ?></td>
                    <td><?= htmlspecialchars($column['email'] ?? '-') ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>