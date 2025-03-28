<?php

class BookCollection extends Model {
    public function getAllBooks(): array {
        $stmt = $this->db->query( 'SELECT * FROM books' );
        return $stmt->fetchALl();
    }

    public function getBookById( int $id ): mixed {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addBook($title, $author, $description, $price){
        $stmt = $this->db->prepare("INSERT INTO books (title, author, description, price) VALUES (:title, :author, :description, :price)");
        $stmt->execute(['title' => $title, 'author' => $author, 'description' => $description, 'price' => $price]);
    }

    public function deleteBook($id){
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}