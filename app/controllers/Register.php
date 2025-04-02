<?php

class Register extends Controller
 {
    public function index()
 {
        $this->view( 'auth/register' );
    }

    public function store()
 {
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
            $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
            $password = trim( $_POST [ 'password' ] );
            $confirmPassword = trim( $_POST[ 'confirm_password' ] );
            
            $validationError = $this->validateRegistration( $name, $email, $password, $confirmPassword );
            if ( $validationError ) {
                $this->view( 'auth/register', [ 'error' => $validationError ] );
                return;
            }
        }


            // // Basic validation
            // if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirmPassword ) ) {
            //     $this->view( 'auth/register', [ 'error' => 'All fields are required' ] );
            //     return;
            // }

            // if ( $password !== $confirmPassword ) {
            //     $this->view( 'auth/register', [ 'error' => 'Passwords do not match' ] );
            //     return;
            // }

            $userModel = $this->model( 'User' );
            $hashedPassword = password_hash( $password, PASSWORD_DEFAULT );

            if ( $userModel->register( $name, $email, $hashedPassword ) ) {
                session_regenerate_id( true );
                header( 'Location: /login', true, 303 );
                exit;
            } else {
                $this->view( 'auth/register', [ 'error' => 'Email already in use' ] );
            }
        }
        private function validateRegistration( $name, $email, $password, $confirmPassword ) {
            if ( empty( $name ) || empty( $email ) || empty( $password ) || empty( $confirmPassword ) ) {
                return 'All fields are required';
            }
            if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
                return 'Invalid email format';
            }
            if ( $password != $confirmPassword ) {
                return 'Passwords do not match';
            }
            if ( strlen( $password ) <8 ) {
                return 'Password must be at least 8 characters long';
            }
            if ( !preg_match( '/[A-Z]/', $password ) || !preg_match( '/[a-z]/', $password ) || !preg_match( '/[0-9]/', $password ) || !preg_match( '/[\W]/', $password ) ) {
                return 'Password must include uppercase, lowercase, number and special character';
            }
            return null;
    }

}

