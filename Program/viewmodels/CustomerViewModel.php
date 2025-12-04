<?php
require_once 'models/CustomerModel.php';

class CustomerViewModel {
    private $model;

    public function __construct($db) {
        $this->model = new CustomerModel($db);
    }

    public function index() {
        $customers = $this->model->getAll();
        include 'views/customer_list.php';
    }

    public function form($id = null) {
        $data = null;
        if ($id) {
            $data = $this->model->getById($id);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $phone = $_POST['phone'];

            if ($id) {
                $this->model->update($id, $name, $phone);
            } else {
                $this->model->insert($name, $phone);
            }
            header("Location: index.php?mod=customer");
            exit;
        }

        include 'views/customer_form.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=customer");
        exit;
    }
}
?>