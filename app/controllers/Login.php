<?php

class Login extends Controller
{

    public function index()
    {
        $this->view('auth/login');
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
            $password = trim($_POST['password']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->view('auth/login', ['error' => 'Invalid email format']);
                return;
            }

            $userModel = $this->model('User');
            $user = $userModel->login($email, $password);
            if ($user) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['cart'] = [];
                header('Location: /dashboard'); // Redirect to the members area
                exit;
            } else {
                $this->view('auth/login', ['error' => 'Invalid email or password']);
            }
        } else {
            header("Location: /login");
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit();
    }
}