<?php
class Admin extends Model {
    public function addBook($data) {
        $stmt = $this->db->prepare("INSERT INTO books (title, description, price) VALUES (:title, :description, :price)");
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
        return $stmt->execute();
    }

    public function getUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}