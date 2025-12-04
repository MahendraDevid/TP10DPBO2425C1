<?php
class SeriesModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        // Join dengan brands untuk menampilkan nama brand
        $sql = "SELECT series.*, brands.name as brand_name 
                FROM series 
                JOIN brands ON series.id_brand = brands.id_brand";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM series WHERE id_series = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($id_brand, $series_name) {
        $stmt = $this->db->prepare("INSERT INTO series (id_brand, series_name) VALUES (?, ?)");
        return $stmt->execute([$id_brand, $series_name]);
    }

    public function update($id, $id_brand, $series_name) {
        $stmt = $this->db->prepare("UPDATE series SET id_brand = ?, series_name = ? WHERE id_series = ?");
        return $stmt->execute([$id_brand, $series_name, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM series WHERE id_series = ?");
        return $stmt->execute([$id]);
    }
}
?>