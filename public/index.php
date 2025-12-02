<?php
// Mengatur session cookie berakhir dalam 1 jam (3600 detik)
// Jika tidak diatur, ia akan mengikuti nilai default
ini_set('session.cookie_lifetime', 3600); 

// Mengatur masa hidup data sesi di server (diperlukan untuk session management yang baik)
ini_set('session.gc_maxlifetime', 3600); 

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan router
$app = new App();