// app/models/Cart.php
<?php
class Cart {
    public function addToCart($bookId) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][$bookId] = ($_SESSION['cart'][$bookId] ?? 0) + 1;
    }

    public function getCartItems() {
        return $_SESSION['cart'] ?? [];
    }

    public function clearCart() {
        $_SESSION['cart'] = [];
    }

    public function getCartDetails($bookModel) {
        $items = $this->getCartItems();
        $cartDetails = [];
        foreach ($items as $bookId => $quantity) {
            $book = $bookModel->getBook($bookId);
            if ($book) {
                $cartDetails[] = [
                    'book' => $book,
                    'quantity' => $quantity
                ];
            }
        }
        return $cartDetails;
    }
}