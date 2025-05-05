<?php
namespace App\Controllers;

class TestDb extends BaseController {
    public function index() {
        try {
            $db = \Config\Database::connect();
            $query = $db->query('SELECT 1');
            echo "Koneksi database berhasil!";
        } catch (\Exception $e) {
            echo "Gagal terhubung ke database: " . $e->getMessage();
        }
    }
}