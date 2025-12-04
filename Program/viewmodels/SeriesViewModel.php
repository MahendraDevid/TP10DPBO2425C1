<?php
require_once 'models/SeriesModel.php';
require_once 'models/BrandModel.php';

class SeriesViewModel {
    private $model;
    private $brandModel;

    public function __construct($db) {
        $this->model = new SeriesModel($db);
        $this->brandModel = new BrandModel($db);
    }

    public function index() {
        $seriesList = $this->model->getAll();
        include 'views/series_list.php';
    }

    public function form($id = null) {
        // Ambil data Brand untuk Dropdown
        $brands = $this->brandModel->getAll();
        
        $data = null;
        if ($id) {
            $data = $this->model->getById($id);
        }

        // Logic Simpan (Add/Update)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_brand = $_POST['id_brand'];
            $series_name = $_POST['series_name'];

            if ($id) {
                $this->model->update($id, $id_brand, $series_name);
            } else {
                $this->model->insert($id_brand, $series_name);
            }
            header("Location: index.php?mod=series");
            exit;
        }

        include 'views/series_form.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=series");
        exit;
    }
}
?>