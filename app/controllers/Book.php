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
        $book = $bookModel->getBookById($id); // Retrieve a specific book by ID

        if ($book) {
            $this->view( 'books/show', [ 'book' => $book ] ); // Pass the specific book to the view
        } else {
            // Handle the case where the book is not found
            $this->view( 'books/not_found', [ 'message' => 'Book not found' ] );
        }
    }
}