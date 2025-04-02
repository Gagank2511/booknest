<?php

class Admin extends Controller
 {
    protected $bookModel;

    public function __construct()
 {
        $this->bookModel = $this->model( 'BookCollection' );

        if ( !$this->isAdmin() ) {
            $this->redirectToLogin();
        }
    }

    private function isAdmin(): bool
 {
        return isset( $_SESSION[ 'user_id' ] ) && $_SESSION[ 'user_role' ] === 'admin';
    }

    private function redirectToLogin(): void
 {
        header( 'Location: /auth/login' );
        exit;
    }

    public function manageBooks()
 {
        $books = $this->bookModel->getAllBooks();
        $this->view( 'admin/manage_books', [ 'books' => $books ] );
    }

    public function addBook(): void
 {
        if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
            $title = trim( $_POST[ 'title' ] );
            $author = trim( $_POST[ 'author' ] );
            $description = trim( $_POST[ 'description' ] );
            $price = floatval( $_POST[ 'price' ] );

            if ( $this->isInvalidBookData( $title, $author, $price ) ) {
                $this->view( 'admin/add_book', [ 'error' => 'All fields are required' ] );
                return;
            }

            $this->bookModel->addBook( $title, $author, $description, $price );
            $this->redirectToManageBooks();
        } else {
            $this->view( 'admin/add_book' );
        }
    }

    private function isInvalidBookData( string $title, string $author, float $price ): bool
 {
        return empty( $title ) || empty( $author ) || $price <= 0;
    }

    private function redirectToManageBooks(): void
 {
        header( 'Location: /admin/manageBooks' );
        exit;
    }

    public function deleteBook( int $id ): void
 {
        $this->bookModel->deleteBook( $id );
        $this->redirectToManageBooks();
    }
}