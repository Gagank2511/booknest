<?php
session_start();

class Checkout extends Controller {
    private $db;


    public function __construct() {
        $this->db=new mysqli('host', 'username', 'password', 'database');
        if($this->db->connect_error){
            die("Connection failed: " . $this->db->connect_error);
        }
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
        $this->db->begin_transaction();
        try {
            //process each item in the cart
            foreach ( $items as $bookId => $quantity ) {
                //load the order model
                $orderModel = $this->model( 'Order' );
    
                //create an order for each item
                $stmt = $this->db->prepare( 'INSERT INTO orders (user_id, book_id, quantity) VALUES (?, ?, ?)' );
                $stmt->bind_param( 'iii', $_SESSION[ 'user_id' ], $bookId, $quantity );
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
        // //redirect to the dashboard
        // $this->redirect('/dashboard');
}
