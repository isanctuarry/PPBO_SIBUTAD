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

   <div class="card p-3">
    <h5 class="mb-3">Daftar Tamu</h5>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Email</th>
                            <th style="width: 140px;">Aksi</th>
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