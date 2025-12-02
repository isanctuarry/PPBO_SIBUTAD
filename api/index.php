<?php
// THIS FILE ONLY FOR REST API — NO ROUTER MVC, NO SESSION

header("Content-Type: application/json");

// Cek route API
$path = $_GET['path'] ?? '';

if ($path === 'getData') {
    echo json_encode(['status' => 'ok']);
    exit;
}

echo json_encode(['error' => 'Unknown API route']);
