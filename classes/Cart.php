<?php

class Cart {
    public function addToCart($bookId, $quantity){
        $_SESSION['cart'][$bookId] = $quantity;
    }

    public function getCartItems(){
        return $_SESSION['cart'] ?? [];
    }

    public function clearCart(){
        unset($_SESSION['cart']);
    }

}