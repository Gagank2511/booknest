<?php
class Admin extends Controller{
    public function manageBooks(){
        $bookModel = $this->model('Book');
        $books = $bookModel->getAllBooks();
        $this->view('admin/manage_books', ['books' => $books]);
    }

    public function addBook(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = trim($_POST['title']);
            $author = trim($_POST['author']);
            $description = trim($_POST['description']);
            $price = floatval($_POST['price']);

            if(empty($title) || empty($author) || empty($price)){
                $this->view('admin/add_book', ['error' => 'All fields are required']);
                return;
            }

            $bookModel = $this->model('Book');
            $bookModel->addBook($title, $author, $description, $price);
            header("Location: /admin/manageBooks");
            exit;
        }
        $this->view('admin/add_book');
    }

    public function deleteBook($id){
        $bookModel = $this->model('model');
        $bookModel->deleteBook($id);
        header("Location: /admin/manageBooks");
        exit;
    }
}