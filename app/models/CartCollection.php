// app/models/Cart.php
<?php
class CartCollection extends Model {
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

    public function getCartDetails() {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id in (:id)");
        $stmt->execute(['id' => $_SESSION['books']]);
        return $stmt->fetch() ?? null;
        

        // $items = $this->getCartItems();
        // $cartDetails = [];

        // foreach ($items as $bookId => $quantity) {
        //     $book = $bookModel->getBook($bookId);
        //     if ($book) {
        //         $cartDetails[] = [
        //             'book' => $book,
        //             'quantity' => $quantity
        //         ];
        //     }
        // }
    }
    public function processOrder() {
        //check if the user is logged in
        if ( !isset( $_SESSION[ 'user_id' ] ) ) {
            header( 'Location: /login' );
            exit;
        }

        $cart = new Cart();
        $items = $cart->getCartItems();

        // Start the transaction
        // $this->db->begin_transaction();
        try {
            //process each item in the cart
            foreach ( $items as $bookId => $quantity ) {
                //load the order model
                // $orderModel = $this->model( 'Order' );
    
                //create an order for each item
                $stmt = $this->db->prepare('INSERT INTO orders (user_id, book_id, quantity) VALUES (?, ?, ?)' );
                $stmt->bindParam( 'iii', $_SESSION[ 'user_id' ], $bookId, $quantity );
                $stmt->execute();
                //$orderModel->createOrder( $_SESSION[ 'user_id' ], $bookId, $quantity );
            }
            //Clear the cart after processing the order
            $cart->clearCart();

            // Commmit transaction
            $this->db->commit();
        } catch (Exception $e){
            // Rollback transaction in case of the error
            $this->db->rollback();
            error_log("Order processing failed: " . $e->getMessage());
            header('Location: /error');
            // $this->redirect('/error');
        
        }
        //Redirect to the dashboard
        header( 'Location: /dashboard' );
        exit;
    }
}