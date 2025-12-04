<?php
require_once 'models/ProductModel.php';
require_once 'models/SeriesModel.php';

class ProductViewModel {
    private $model;
    private $seriesModel;

    public function __construct($db) {
        $this->model = new ProductModel($db);
        $this->seriesModel = new SeriesModel($db);
    }

    // Menampilkan List Data
    public function index() {
        $products = $this->model->getAll();
        include 'views/product_list.php'; // Sesuai nama file di gambar
    }

    // Menangani Form (Add & Edit jadi satu)
    public function form($id = null) {
        // Ambil data dropdown series untuk form
        $seriesList = $this->seriesModel->getAll(); // Asumsi SeriesModel punya getAll()
        
        $data = null;
        if ($id) {
            // Jika ada ID, berarti mode EDIT
            $data = $this->model->getById($id);
        }

        // Logic Simpan (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = [
                'id_series' => $_POST['id_series'],
                'product_name' => $_POST['product_name'],
                'scale' => $_POST['scale'],
                'price' => $_POST['price']
            ];

            if ($id) {
                $this->model->update($id, $input);
            } else {
                $this->model->insert($input);
            }
            header("Location: index.php?mod=product");
            exit;
        }

        include 'views/product_form.php'; // Load view form
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=product");
        exit;
    }
}
?>