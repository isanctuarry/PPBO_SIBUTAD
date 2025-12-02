<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
use App\Core\Auth;
use App\Models\ViewData; 

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
        
        // Jika URL yang diakses adalah halaman yang dilindungi (bukan login/logout/doLogin), cek sesi.
        if (!in_array($url, ['admin/login', 'admin/dologin', 'admin/logout'])) {
            $this->checkAdminSession();
        }
    }

    /**
     * Method Pembantu: Memeriksa Sesi Admin dan melakukan Redirect jika gagal.
     */
    protected function checkAdminSession() {

        // Cek apakah data sesi admin tidak ada
        if (!isset($_SESSION['admin'])) { 
            
            // Set notifikasi flash message 
            $_SESSION['flash_message'] = 'Sesi Anda telah berakhir. Silakan login kembali.';
            
            // Redirect ke halaman login menggunakan $this->base_url yang aman
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
            $adminData = [
                'id' => 999,
                'username' => $user_rahasia,
                'nama' => 'Administrator'
            ];

            // Login Sukses
            Auth::login($adminData);
            header("Location: " . $this->base_url . "/index.php?url=admin/dashboard");
            exit;

        } else {
            // Login Gagal
            $this->view('Admin/Login', [
                'title' => 'Login Admin', 
                'error' => 'Username atau password salah'
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        header("Location: " . $this->base_url . "/index.php?url=admin/login");
        exit;
    }

    /**
     * Halaman Dashboard Admin (index.php?url=admin/dashboard)
     */
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