<?php
class Admin extends Controller{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = $this->model('BookCollection');

        if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin'){
            header("Location: /auth/login");
            exit;
        }
    }

    public function manageBooks(){
        $books = $this->bookModel->getAllBooks();
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

            $this->bookModel->addBook($title, $author, $description, $price);
            header("Location: /admin/manageBooks");
            exit;
        }
        $this->view('admin/add_book');
    }

    public function deleteBook($id){
        $this->bookModel->deleteBook($id);
        header("Location: /admin/manageBooks");
        exit;
    }
}