<?php require __DIR__ . '/../Layout/Header.php'; ?>

<!-- FONT & STYLE MODERN -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<div class="mb-3">
    <button 
        onclick="history.back()" 
        class="btn btn-sm btn-outline-primary" 
        title="Kembali ke halaman sebelumnya">
        &larr; Kembali
    </button>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center fw-bold">
                Edit Kegiatan
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
                        <!-- Tombol kembali diubah warna sesuai tema -->
                        <a href="<?= $base_url ?>/index.php?url=kegiatan" class="btn btn-outline-primary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
