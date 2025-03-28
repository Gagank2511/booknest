<?php

class Book extends Controller {
    public function index() {
        $bookModel = $this->model( 'BookCollection' );
        //Check if a search term is provided
        if (isset($_GET['search'])){
            $searchTerm = trim($_GET['search']);
            $books = $bookModel->searchBooks($searchTerm); //search for books
        } else {
            $books = $bookModel->getAllBooks(); //get all books
        }
        $this->view( 'books/index', [ 'books' => $books ] ); //pass books to the view
    }

    public function show( $id ) {
        $bookModel = $this->model( 'BookCollection' );
        $books = $bookModel->getAllBooks();
        $this->view( 'books/show', [ 'books' => $books ] );
    }
}