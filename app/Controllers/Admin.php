<?php
namespace App\Controllers;
use App\Models\HewanModel;
use App\Models\UserModel;

class Admin extends BaseController {
    protected $hewanModel;
    protected $userModel;

    public function __construct() {
        $this->hewanModel = new HewanModel();
        $this->userModel = new UserModel();
    }

    public function login() {
        return view('admin/login');
    }

    public function auth() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username dan password harus diisi.');
        }

        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        session()->set(['user_id' => $user['id'], 'role' => $user['role']]);
        return redirect()->to('/admin/dashboard')->with('success', 'Login berhasil!');
    }

    public function dashboard() {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $data['hewan'] = $this->hewanModel->findAll();
        return view('admin/dashboard', $data);
    }

    public function create() {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('admin/create');
    }

    public function store() {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $file = $this->request->getFile('gambar');
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Gambar tidak valid.');
        }

        $fileName = $file->getRandomName();
        $file->move('uploads', $fileName);

        $this->hewanModel->save([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'habitat' => $this->request->getPost('habitat'),
            'status_konservasi' => $this->request->getPost('status_konservasi'),
            'gambar' => $fileName,
            'videoUrl' => $this->request->getPost('videoUrl'),
            'biogeographicRegion' => $this->request->getPost('biogeographicRegion')
        ]);

        return redirect()->to('/admin/dashboard')->with('success', 'Data hewan berhasil ditambahkan.');
    }

    public function edit($id) {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $data['hewan'] = $this->hewanModel->find($id);
        if (!$data['hewan']) {
            return redirect()->to('/admin/dashboard')->with('error', 'Data hewan tidak ditemukan.');
        }
        return view('admin/edit', $data);
    }

    public function update($id) {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'habitat' => $this->request->getPost('habitat'),
            'status_konservasi' => $this->request->getPost('status_konservasi'),
            'videoUrl' => $this->request->getPost('videoUrl'),
            'biogeographicRegion' => $this->request->getPost('biogeographicRegion')
        ];

        $file = $this->request->getFile('gambar');
        if ($file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->hewanModel->update($id, $data);
        return redirect()->to('/admin/dashboard')->with('success', 'Data hewan berhasil diperbarui.');
    }

    public function delete($id) {
        if (!session()->get('user_id')) {
            return redirect()->to('/admin/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $this->hewanModel->delete($id);
        return redirect()->to('/admin/dashboard')->with('success', 'Data hewan berhasil dihapus.');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin/login')->with('success', 'Logout berhasil.');
    }
}