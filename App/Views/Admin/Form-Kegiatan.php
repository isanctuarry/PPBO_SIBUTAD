<?php require __DIR__ . '/../Layout/Header.php'; ?>
<div style="margin-bottom: 15px;">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-secondary" 
        title="Kembali ke halaman sebelumnya">
        
        &larr; Kembali 
        
        </button>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
            <a href="<?= $base_url ?>/index.php?url=kegiatan/edit&id=<?= $k['id_kegiatan']; ?>" class="btn btn-sm btn-secondary">
            Edit Kegiatan
            </a>
            </div>
        </div>

            <div class="card-body">
                <form action="<?= $base_url ?>/index.php?url=kegiatan/update" method="POST">

                    <input type="hidden" name="id_kegiatan" value="<?= $kegiatan['id_kegiatan']; ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kegiatan</label>
                        <input type="text" 
                               name="nama_kegiatan" 
                               class="form-control"
                               required
                               value="<?= htmlspecialchars($kegiatan['nama_kegiatan']); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Kegiatan</label>
                        <input type="date" 
                               name="tanggal_kegiatan"
                               class="form-control"
                               required
                               value="<?= $kegiatan['tanggal_kegiatan']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Lokasi</label>
                        <input type="text" 
                               name="lokasi"
                               class="form-control"
                               value="<?= htmlspecialchars($kegiatan['lokasi']); ?>">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?= $base_url ?>/index.php?url=kegiatan" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
