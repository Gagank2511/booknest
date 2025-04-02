<?php

class Review extends Model {
    public function addReview( $userId, $bookId, $rating, $comment ) {
        // if ( !is_int( $userId ) || !is_int( $bookId ) || !is_numeric( $rating ) || !is_string( $comment ) ) {
        //     throw new InvalidArgumentException( 'Invalid input parameters' );
        // }

        try {
            $stmt = $this->db->prepare( 'INSERT INTO reviews (user_id, book_id, rating, comment) VALUES (:user_id, :book_id, :rating, :comment' );
            $stmt->execute( [ 'user_id' => $userId, 'book_id' => $bookId, 'rating' => $rating, 'comment' => $comment ] );

        } catch ( PDOException $e ) {
            error_log( 'Database error in addReview: ' . $e->getMessage() );
            throw $e;
        }
    }

    public function getReviewsByBookId( $bookId ) {
        try {
            $stmt = $this->db->prepare( 'SELECT * FROM reviews WHERE book_id = :book_id' );
            $stmt->execute( [ 'book_id' => $bookId ] );
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
            error_log( 'Database error in getReviewsByBookId: ' . $e->getMessage() );
            throw $e;
        }
    }
}