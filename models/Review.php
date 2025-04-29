<?php

class Review extends Model {
    public function addReview( $userId, $bookId, $rating, $comment ) {
        $stmt = $this->db->prepare( 'INSERT INTO reviewa (user_id, book_id, rating, comment) VALUES (:user_id, :book_id, :rating, :comment' );
        $stmt->execute( [ 'user_id' => $userId, 'book_id' => $bookId, 'rating' => $rating, 'comment' => $comment ] );
    }

    public function getReviewsByBookId($bookId) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE book_id = :book_id");
        $stmt->execute(['book_id' => $bookId]);
        return $stmt->fetchAll();
    }
}