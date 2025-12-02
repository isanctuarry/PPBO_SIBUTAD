<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\App;

$base_url= "https://ppbo-sibutad-kohl.vercel.app";

// Jalankan router
$app = new App();