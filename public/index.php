<?php

ini_set('session.cookie_lifetime', 0); 
ini_set('session.gc_maxlifetime', 387744378); 

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan router
$app = new App();