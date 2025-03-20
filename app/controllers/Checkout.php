<?php

class Checkout extends Controller{
    public function processOrder(){
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        $cart = new Cart();
        $items = $cart->getCartItems();

        foreach ($items as $bookId => $quantity) {
            $orderModel = $this->model('Order');
            $orderModel->createOrder($_SESSION['user_id'], $bookId, $quantity);
        }

        $cart->clearCart();
        header("Location: /dashboard");
        exit;
    }
}