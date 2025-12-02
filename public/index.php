<?php

ini_set('session.cookie_lifetime', 720); 
ini_set('session.gc_maxlifetime', 720); 

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan router
$app = new App();