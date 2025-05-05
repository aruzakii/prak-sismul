<?php
namespace App\Models;
use CodeIgniter\Model;

class HewanModel extends Model {
    protected $table = 'hewan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'habitat', 'status_konservasi', 'gambar', 'videoUrl', 'biogeographicRegion'];
    protected $useTimestamps = false;
}