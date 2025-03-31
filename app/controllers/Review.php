<?php

class Review extends Controller {
    public function add( $bookId = null ) {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        //validate and sanitise input
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            $rating = filter_var( $_POST[ 'rating' ], FILTER_VALIDATE_INT, [ 'options' => [ 'min_range' => 1, 'max_range' => 5 ] ] );
            $comment = filter_var( trim( $_POST[ 'comment' ] ) );

            //validate session user id
            if ( !isset( $_SESSION[ 'user_id' ] ) || !is_numeric( $_SESSION[ 'user_id' ] ) ) {
                header( 'Location: /login' );
                exit;
            }
            $userId = $_SESSION[ 'user_id' ];

            //check if input is valid
            if ( $rating == false || empty( $comment ) ) {
                header('Location: /error?message=Invalid+input');
                exit;
            }

            // get the review model and add review
            $reviewModel = $this->model( 'Review' );
            if ( !$reviewModel->addReview( $userId, $bookId, $rating, $comment ) ) {
                error_log( "Failed to add review for book ID: $bookId by user ID: $userId" );
                header( "Location: /error?message=Failed+to+add+review" );
                exit;
            }

            header( "Location: /books/show/$bookId" );
            exit;
        }
    }
}