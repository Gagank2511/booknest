<?php

class BookController extends Controller {
    public function index() {
        $bookModel = $this->model( 'Book' );
        $books = $bookModel->getAllBooks();
        $this->view( 'books/index', [ 'books' => $books ] );
    }

    public function show( $id ) {
        $bookModel = $this->model( 'Book' );
        $books = $bookModel->getAllBooks();
        $this->view( 'books/show', [ 'books' => $books ] );
    }
}