<?php require __DIR__ . '/../Layout/Header.php'; ?>
<div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        
        &larr; Kembali 
        
        </button>
</div>
<div class="container mt-5">
    
    <div class="row align-items-center mb-4 border-bottom pb-2">
        <div class="col-md-6">
            <h2 class="text-secondary fw-light">Daftar Tamu</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="/tambah-tamu" class="btn btn-outline-primary">
                + Tambah Tamu Baru
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light"> 
                        <tr>
                            <th scope="col" class="text-muted small">#</th>
                            <th scope="col" class="text-muted small">NAMA</th>
                            <th scope="col" class="text-muted small">TANGGAL KUNJUNGAN</th>
                            <th scope="col" class="text-muted small">EMAIL</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($tamu)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data tamu yang tercatat.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($tamu as $i => $column): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($column['nama']) ?></td>
                                    <td><?= htmlspecialchars($column['tanggal_kunjungan']) ?></td>
                                    <td><?= htmlspecialchars($column['email']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div> </div> </div> </div> <?php require __DIR__ . '/../Layout/Footer.php'; ?>