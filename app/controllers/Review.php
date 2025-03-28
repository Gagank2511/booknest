<?php

class Review extends Controller {
    public function add( $bookId = null) {
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            $rating = intval( $_POST[ 'rating' ] );
            $comment = trim( $_POST[ 'comment' ] );
            $userId = $_SESSION[ 'user_id' ];

            $reviewModel = $this->model( 'Review' );
            $reviewModel->addReview( $userId, $bookId, $rating, $comment );
            header( "Location: /books/show/$bookId" );
            exit;
        }
    }
}