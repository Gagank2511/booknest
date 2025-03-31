<?php
session_start();

class Checkout extends Controller {
    public function processOrder() {
        //check if the user is logged in
        if ( !isset( $_SESSION[ 'user_id' ] ) ) {
            header( 'Location: /login' );
            exit;
        }

        $cart = new Cart();
        $items = $cart->getCartItems();

        //process each item in the cart
        foreach ( $items as $bookId => $quantity ) {
            //load the order model
            $orderModel = $this->model( 'Order' );
            //create an order for each item
            $orderModel->createOrder( $_SESSION[ 'user_id' ], $bookId, $quantity );
        }

        //Clear the cart after processing the order
        $cart->clearCart();

        //Redirect to the dashboard
        header( 'Location: /dashboard' );
        exit;
    }
}