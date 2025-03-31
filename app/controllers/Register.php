<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('auth/register');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] )){
                $this->view('auth/register', ['error' => 'Invalid CSRF token']);
                return;
            }
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);


            $validationError = $this->validateRegistration($name, $email, $password, $confirmPassword);
            if($validationError){
                $this->view('auth/register', ['error' => $validationError]);
                return;
            }

            // // Basic validation
            // if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
            //     $this->view('auth/register', ['error' => 'All fields are required']);
            //     return;
            // }

            // if ($password !== $confirmPassword) {
            //     $this->view('auth/register', ['error' => 'Passwords do not match']);
            //     return;
            // }

            $userModel = $this->model('User');
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            if ($userModel->register($name, $email, $password)) {
                header('Location: /login');
                exit;
            } else {
                $this->view('auth/register', ['error' => 'Email already in use']);
            }
        }
    }
    private function validateRegistration($name, $email, $password, $confirmPassword){
        if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)){
            return 'All fields are required';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Invalid email format';
        }
        if ($password != $confirmPassword) {
            return 'Passwords do not match';
        }
        return null;
    }
}