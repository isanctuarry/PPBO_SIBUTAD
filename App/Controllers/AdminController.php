<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
use App\Core\Auth; 
use App\Models\ViewData; 
use Firebase\JWT\JWT;      
use Firebase\JWT\Key;      
use Exception;             



class AdminController extends Controller {

    protected $adminModel;
    protected $base_url; // Variabel untuk menyimpan URL dasar

    public function __construct() {
        // 1. Inisialisasi Model
        $this->adminModel = new Admin();
        
        // 2. Tentukan Base URL secara dinamis (penting untuk Vercel & Laragon)
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        // Menggunakan operator null coalescing (??) untuk lingkungan Vercel/CLI
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost'; 
        $this->base_url = $protocol . "://" . $host;
        
        // 3. Pengecekan Sesi: Panggil HANYA jika bukan halaman Login atau DoLogin
        $url = $_GET['url'] ?? '';
        

       if (!preg_match('/^admin\/(login|dologin|logout)$/', $url)) {
    $this->checkAdminSession();
        }
    }

    /**
     * Method Pembantu: Memeriksa Sesi Admin dan melakukan Redirect jika gagal.
     */
    protected function checkAdminSession() {
    $secretKey = 'SIBUTAD_KUNCI_RAHASIA_VERCEL';
    $jwt = $_COOKIE['auth_token'] ?? null;

    if (!$jwt) {
        // Token tidak ada di cookie, redirect ke login
        $_SESSION['flash_message'] = 'Sesi Anda telah berakhir. Silakan login kembali.';
        
        // Pastikan Anda memanggil session_start() di public/index.php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        header('Location: ' . $this->base_url . '/index.php?url=admin/login');
        exit;
    }

    try {
        // 1. Dekode dan verifikasi Token
        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        
        // 2. Jika token valid, Anda bisa memuat data user ke $_SESSION 
        //    (Opsional, hanya jika masih ada kode yang bergantung pada $_SESSION['admin'])
        if (!isset($_SESSION['admin'])) {
            $_SESSION['admin'] = (array) $decoded->data; 
        }

    } catch (Exception $e) {
        // 3. Token tidak valid (kedaluwarsa, diubah, atau signature salah)
        
        // Hapus cookie yang rusak
        setcookie("auth_token", "", time() - 3600, '/'); 
        
        // Pastikan Anda memanggil session_start() di public/index.php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['flash_message'] = 'Sesi tidak valid atau telah kedaluwarsa. Silakan login kembali.';
        header('Location: ' . $this->base_url . '/index.php?url=admin/login');
        exit;
        }
    }

    public function index() {
        // Karena pengecekan sesi sudah dilakukan di __construct(), kita langsung ke dashboard.
        $this->dashboard();
    }

    public function login() {
        // Jika user sudah login, langsung alihkan ke dashboard
        if(isset($_SESSION['admin'])) {
            header("Location: " . $this->base_url . "/index.php?url=admin/dashboard");
            exit;
        }
        // Tampilkan halaman login
        $this->view('Admin/Login', ['title' => 'Login Admin']);
    }

    public function doLogin() {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $user_rahasia = 'admin';
    $pass_rahasia = 'admin123'; 

    if($username === $user_rahasia && $password === $pass_rahasia) {
        $secretKey = 'SIBUTAD_KUNCI_RAHASIA_VERCEL'; // GANTI dengan kunci acak yang kuat!
        $tokenDuration = 3600 * 24 * 7; // Token berlaku 7 hari (dalam detik)

        $payload = [
            'iat' => time(), // Issued At (waktu dibuat)
            'exp' => time() + $tokenDuration, // Expiration (waktu kedaluwarsa)
            'data' => [
                'id' => 999,
                'username' => $user_rahasia
            ]
        ];

        $jwt = JWT::encode($payload, $secretKey, 'HS256');

        // Mengirim Token sebagai Cookie HTTP
        setcookie("auth_token", $jwt, [
            'expires' => $payload['exp'],
            'path' => '/',          // Token berlaku di seluruh path domain
            'httponly' => true,     // Melindungi dari XSS (Wajib!)
            'secure' => true,       // Wajib di Vercel (HTTPS)
            'samesite' => 'Strict'  // Wajib untuk keamanan
        ]);
        
        // Hapus sesi lama PHP jika masih ada, untuk transisi
        if (isset($_SESSION['admin'])) {
             unset($_SESSION['admin']);
        }

        header("Location: " . $this->base_url . "/index.php?url=admin/dashboard");
        exit;

    } else {
        // ... Logika Login Gagal ...
        $this->view('Admin/Login', ['title' => 'Login Admin', 'error' => 'Username atau password salah']);
    }
}
    public function logout() {
    // 1. Hapus cookie token dengan mengatur waktu kedaluwarsa di masa lalu
    setcookie("auth_token", "", time() - 3600, '/'); 
    
    // 2. Hapus sesi PHP lama jika masih ada (untuk kebersihan)
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
    }
    
    header("Location: " . $this->base_url . "/index.php?url=admin/login");
    exit;
}

    public function dashboard() {
        // Pengecekan sesi sudah dihandle oleh __construct()
        
        $stat = []; 
        if(class_exists('\App\Models\ViewData')) {
            $viewModel = new \App\Models\ViewData();
            $stat = $viewModel->getStatistik();
        }

        $this->view('Admin/Dashboard', ['title' => 'Dashboard', 'stat' => $stat]);
    }
    
    // --- Anda bisa menambahkan fungsi lain seperti kelolaKegiatan() di sini ---
    /*
    public function kelolaKegiatan() {
        // Otomatis dicek sesinya di __construct
        // ... Logika pemuatan data ...
        $this->view('Admin/KelolaKegiatan', ['title' => 'Kelola Kegiatan']);
    }
    */
}