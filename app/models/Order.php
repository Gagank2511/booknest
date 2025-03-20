<?php
class Order extends Model{
    public function createOrder($userId, $bookId, $quantity){
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, book_id, quantity) VALUES (:user_id, :book_id, :quantity)");
        $stmt->execute(['user_id' => $userId, 'book_id' => $bookId, 'quantity' => $quantity]);
    }
}