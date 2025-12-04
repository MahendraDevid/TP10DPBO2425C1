<?php
// Load Config Database
require_once 'config/config.php';

// Inisialisasi Koneksi
$database = new Database();
$db = $database->getConnection();

// Routing Parameter
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'product'; // Default ke product
$act = isset($_GET['act']) ? $_GET['act'] : 'index';
$id  = isset($_GET['id']) ? $_GET['id'] : null;

// Routing Switch
switch ($mod) {
    case 'brand':
        require_once 'viewmodels/BrandViewModel.php';
        $vm = new BrandViewModel($db);
        break;
    case 'series':
        require_once 'viewmodels/SeriesViewModel.php';
        $vm = new SeriesViewModel($db);
        break;
    case 'product':
        require_once 'viewmodels/ProductViewModel.php';
        $vm = new ProductViewModel($db);
        break;
    case 'customer':
        require_once 'viewmodels/CustomerViewModel.php';
        $vm = new CustomerViewModel($db);
        break;
    default:
        die("Modul tidak ditemukan!");
}

// Action Switch
if ($act == 'index') {
    $vm->index();
} elseif ($act == 'form') {
    // Satu action untuk Add dan Edit
    $vm->form($id);
} elseif ($act == 'delete') {
    $vm->delete($id);
} else {
    $vm->index();
}
?>