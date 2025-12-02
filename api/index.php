<?php  
// Force working directory to project root
chdir(__DIR__ . '/..'); 

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan App MVC
$app = new App();
