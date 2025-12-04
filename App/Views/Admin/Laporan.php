<?php require __DIR__ . '/../Layout/Header.php'; ?>

<div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        &larr; Kembali
    </button>
</div>

<h4>Rekap Tamu per Kegiatan</h4>

<div class="card p-3">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Kegiatan</th>
                <th>Total Tamu</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($rekap)): ?>
                <tr>
                    <td colspan="3" class="text-center">Belum ada data.</td>
                </tr>
            <?php else: ?>
                <?php foreach($rekap as $i => $r): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($r['nama_kegiatan']) ?></td>
                        <td><?= htmlspecialchars($r['total_tamu']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
