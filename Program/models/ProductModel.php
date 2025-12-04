<?php
class ProductModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        // Join Series dan Brand untuk info lengkap
        $sql = "SELECT products.*, series.series_name, brands.name as brand_name 
                FROM products 
                JOIN series ON products.id_series = series.id_series
                JOIN brands ON series.id_brand = brands.id_brand";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id_product = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $sql = "INSERT INTO products (id_series, product_name, scale, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$data['id_series'], $data['product_name'], $data['scale'], $data['price']]);
    }

    public function update($id, $data) {
        $sql = "UPDATE products SET id_series=?, product_name=?, scale=?, price=? WHERE id_product=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$data['id_series'], $data['product_name'], $data['scale'], $data['price'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id_product = ?");
        return $stmt->execute([$id]);
    }
}
?>