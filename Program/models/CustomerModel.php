<?php
class CustomerModel {
    private $db;

    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        return $this->db->query("SELECT * FROM customers")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id_customer = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($name, $phone) {
        $stmt = $this->db->prepare("INSERT INTO customers (name, phone) VALUES (?, ?)");
        return $stmt->execute([$name, $phone]);
    }

    public function update($id, $name, $phone) {
        $stmt = $this->db->prepare("UPDATE customers SET name=?, phone=? WHERE id_customer=?");
        return $stmt->execute([$name, $phone, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM customers WHERE id_customer = ?");
        return $stmt->execute([$id]);
    }
}
?>