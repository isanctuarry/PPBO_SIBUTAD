<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Force working directory to project root
chdir(__DIR__ . '/..'); 
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan router
$app = new App();