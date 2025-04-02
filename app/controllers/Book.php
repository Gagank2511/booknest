<?php
class Book extends Controller {
    public function index() {
        $bookModel = $this->model('BookCollection');
        $books = $bookModel->getAllBooks(); // Fetch all books
        $this->view('book/index', ['books' => $books]); // Pass books to the view
    }
    public function show($id){
        $bookModel = $this->model('BookCollection');
        $book = $bookModel->getBookById($id);
        $this->view('book/show', ['book' => $book]);
    }

    public function search() {
        $bookModel = $this->model('BookCollection');
        $books = [];

        if (isset($_GET['search'])) {
            $searchTerm = trim($_GET['search']);
            $books = $bookModel->searchBooks($searchTerm); // Search for books
        }

        $this->view('book/index', ['books' => $books]); // Pass search results to the view
    }
}
?>