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
    
    <div class="mb-4 border-bottom pb-2">
        <h2 class="text-secondary fw-light">Daftar Tamu</h2>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-muted small">#</th>
                            <th scope="col" class="text-muted small">NAMA</th>
                            <th scope="col" class="text-muted small">TANGGAL KUNJUNGAN</th>
                            <th scope="col" class="text-muted small">EMAIL</th>
                            <th scope="col" class="text-muted small text-center">AKSI</th> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($tamu)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data tamu yang tercatat.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($tamu as $i => $column): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= htmlspecialchars($column['nama']) ?></td>
                                    <td><?= htmlspecialchars($column['tanggal_kunjungan']) ?></td>
                                    <td><?= htmlspecialchars($column['email']) ?></td>
                                    
                                    <td class="text-center">
                                            <!-- EDIT (icon pensil) -->
                                            <a href="/tamu/edit/<?= $column['id'] ?? ($i + 1) ?>" 
                                            class="btn btn-sm btn-primary me-2"
                                            title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <!-- HAPUS (icon trash) -->
                                            <form action="/tamu/hapus/<?= $column['id'] ?? ($i + 1) ?>" 
                                                method="POST" 
                                                class="d-inline">
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form> 
                                        </td>
                                     </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</div>
<?php require __DIR__ . '/../Layout/Footer.php'; ?>