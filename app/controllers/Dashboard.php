<?php
class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        //Sanitise user input to prevent XSS
        $userName = htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8');

        $this->view('dashboard/index', ['user' => $userName]);
    }
}