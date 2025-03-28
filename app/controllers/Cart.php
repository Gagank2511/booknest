<?php

class Cart extends Controller {
    public function addToCart( $bookId, $quantity ) {
        // Starting the cart session if it is not already set
        if ( !isset ( $_SESSION[ 'cart' ] ) ) {
            $_SESSION[ 'cart' ] = [];
        }
    }

    // 
    public function getCartItems() {
        return $_SESSION[ 'cart' ] ?? [];
    }

    public function clearCart() {
        unset( $_SESSION[ 'cart' ] );
    }

}