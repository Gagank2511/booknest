<?php

class Cart extends Controller {
    public function addToCart(int $bookId, int $quantity ) {
        // Starting the cart session if it is not already set
        if ( !isset ( $_SESSION[ 'cart' ] ) ) {
            $_SESSION[ 'cart' ] = [];
        }

        // Update the quantity of the book if it is already set
        if ( isset( $_SESSION[ 'cart' ][ $bookId ] ) ) {
            $_SESSION[ 'cart' ][ $bookId ] += $quantity;
        } else {
            // Add new book to cart
            $_SESSION[ 'cart' ][ $bookId ] = $quantity;
        }
    }

    //get all the items in the carts
    public function getCartItems() {
        return $_SESSION[ 'cart' ] ?? [];
    }

    public function clearCart() {
        unset( $_SESSION[ 'cart' ] );
    }

    // Displaying the cart view
    public function viewCart() {
        $bookModel = $this->model('BookCollection');
        $cartItems = $this->getCartItems();
        $books = [];

        //Fetching book details for each item in the cart
        foreach ($cartItems as $bookId => $quantity) {
            $book = $bookModel->getBookById($bookId);
            if($book) {
                $books[] = [
                    'book' => $book,
                    'quantity' => $quantity
                ];
            }
        }
        $this->view('cart/view', ['books' => $books]);
    }

}