<?php

class Home extends Controller
{
    /**
     * Loads the home page view with a sanitized title.
     *
     * @return void
     */
    public function index()
    {
        try {
            $title = $this->sanitizeInput('Home Page');
            $this->view('home/index', ['title' => $title]);
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->view('error/index', ['message' => 'An error occurred while loading the page.']);
        }
    }

    /**
     * Sanitize input to prevent XSS attacks.
     *
     * @param string $input
     * @return string
     */
    private function sanitizeInput($input)
    {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}