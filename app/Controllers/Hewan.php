<?php
namespace App\Controllers;
use App\Models\HewanModel;

class Hewan extends BaseController {
    protected $hewanModel;

    public function __construct() {
        $this->hewanModel = new HewanModel();
    }

    public function index() {
        $data['hewan'] = $this->hewanModel->findAll();
        return view('hewan/index', $data);
    }

    public function detail($id) {
        $data['hewan'] = $this->hewanModel->find($id);
        return view('hewan/detail', $data);
    }
}