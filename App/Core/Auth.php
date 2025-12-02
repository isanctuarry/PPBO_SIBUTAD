<?php

namespace App\Core;

class Auth {

    public static function checkLogin() {
        if(!isset($_SESSION['admin'])) {
            header("Location: /index.php?url=admin/login");
            exit;
        }
    }

    public static function login($adminData) {
        $_SESSION['admin'] = $adminData;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }
}
