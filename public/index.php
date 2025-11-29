<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

// Jalankan router
$app = new App();