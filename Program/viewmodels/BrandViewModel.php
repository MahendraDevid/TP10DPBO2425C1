<?php
require_once 'models/BrandModel.php';

class BrandViewModel {
    private $model;

    public function __construct($db) {
        $this->model = new BrandModel($db);
    }

    // 1. Menampilkan Daftar Brand
    public function index() {
        $brands = $this->model->getAll(); 
        // Perbaikan: Path view disesuaikan dengan struktur flat file
        include 'views/brand_list.php';
    }

    // 2. Menangani Form (Tambah & Edit digabung)
    public function form($id = null) {
        $data = null;
        
        // Jika ada ID, berarti sedang Edit -> Ambil data lama
        if ($id) {
            $data = $this->model->getById($id);
        }

        // Logic Simpan Data (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];

            if ($id) {
                // Proses Update
                $this->model->update($id, $name);
            } else {
                // Proses Insert
                $this->model->insert($name);
            }
            
            // Redirect kembali ke index
            header("Location: index.php?mod=brand");
            exit;
        }

        // Perbaikan: Path view disesuaikan dengan struktur flat file
        include 'views/brand_form.php';
    }

    // 3. Menghapus Data
    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=brand");
        exit;
    }
}
?>