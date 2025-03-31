<?php
class Order extends Model{
    public function createOrder($userId, $bookId, $quantity){
        if(!is_int($userId) || $userId <= 0){
            throw new InvalidArgumentException("Invalid user ID.");
        }
        if(!is_int($bookId) || $bookId <= 0){
            throw new InvalidArgumentException("Invalid book ID.");
        }
        if(!is_int($quantity) || $quantity <= 0){
            throw new InvalidArgumentException("Invalid quantity.");
        }
        
        
        
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("INSERT INTO orders (user_id, book_id, quantity) VALUES (:user_id, :book_id, :quantity)");
            $stmt->execute(['user_id' => $userId, 'book_id' => $bookId, 'quantity' => $quantity]);
            $this->db->commit();
            return true;

        } catch (PDOException $e) {
            $this->db->rollback();
            error_log("Error creating order: " . $e->getMessage());
            return false;
        }
    }
}