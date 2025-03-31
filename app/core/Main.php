<?php
session_start();

class Main
 {
    private $controller = 'Home';
    // Default controller
    private $method = 'index';
    // Default method
    private $params = [];
    // URL parameters

    public function __construct()
 {
        $url = $this->parseUrl();

        // Check if the controller file exists
        if ( file_exists( '../app/controllers/' . ucfirst( $url[ 0 ] ) . '.php' ) ) {
            $this->controller = ucfirst( $url[ 0 ] );
            unset( $url[ 0 ] );
        }

        // Include the controller file
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Check if method exists in the controller
        if ( isset( $url[ 1 ] ) && method_exists( $this->controller, $url[ 1 ] ) ) {
            $this->method = $url[ 1 ];
            unset( $url[ 1 ] );
        }

        // Set remaining URL segments as parameters
        $this->params = $url ? array_values( $url ) : [];

        // Call the method with parameters
        call_user_func_array( [ $this->controller, $this->method ], $this->params );
    }
        //     var_dump( $_GET );
        //     //check if the first segment of the URL is 'cart'
        //     if ( $url[ 0 ] && $url[ 0 ] == 'cart' ) {
        //         $cartController = new Cart();
        //         //create an instance of a cart controller

        //         if ( isset( $url[ 1 ] ) ) {
        //             $action = $url[ 1 ];
        //             // get the action from the url
        //             switch ( $action ) {
        //                 case 'add':
        //                    // Make sure bookId and Quantity are provided in the url
        //                     if ( isset( $url[ 2 ] ) && isset( $url[ 3 ] ) ) {
        //                         $bookId = intval( $url[ 2 ] );
        //                         $quantity = intval( $url[ 3 ] );
        //                         $cartController ->addToCart( $bookId, $quantity );
        //                         header( 'Location: /books/cartView' );
        //                         exit;
        //                     } else {
        //                         die( 'Error: Missing book ID or quantity.' );
        //                     }
        //                     break;
        //                 case 'view':
        //                     $cartController->viewCart();
        //                     break;

        //                 case 'clear':
        //                     $cartController->clearCart();
        //                     header( 'Location: /books/cartView' );
        //                     exit;
        //                     break;
        //                 default:
        //                     die( 'Error: Unknown cart action.' );
        //                     break;

        //             }
        //         } else {
        //             $cartController->viewCart();
        //         }

        //     }
        // }

        private function parseUrl() {
            if ( isset( $_GET[ 'url' ] ) ) {
                return explode( '/', filter_var( rtrim( $_GET[ 'url' ], '/' ), FILTER_SANITIZE_URL ) );
            }
            return [ 'Home' ];
            // Default controller
        }
}
