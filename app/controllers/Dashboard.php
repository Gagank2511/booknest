<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $this->view('dashboard/index', ['user' => $_SESSION['user_name']]);
    }
}