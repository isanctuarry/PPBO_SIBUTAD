-- PostgreSQL
-- =========================================
-- TABLE: admin
-- =========================================
CREATE TABLE IF NOT EXISTS admin (
    id BIGSERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    -- Catatan: panjang password 50 hanya cukup untuk hash MD5/SHA1.
    -- Jika pakai bcrypt/argon, idealnya VARCHAR(255).
    password VARCHAR(100) NOT NULL
);

-- =========================================
-- TABLE: kegiatan
-- =========================================
CREATE TABLE IF NOT EXISTS kegiatan (
    id BIGSERIAL PRIMARY KEY,
    nama_kegiatan VARCHAR(50) NOT NULL,
    tanggal_kegiatan DATE NOT NULL,
    lokasi VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS tamu (
    id BIGSERIAL PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    tanggal_kegiatan DATE NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO kegiatan (id, nama_kegiatan, tanggal_kegiatan, lokasi)
VALUES 
    (1, 'Karya Wisata', '2025-11-29', 'Perpustakaan');
