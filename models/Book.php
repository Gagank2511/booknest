<?php

class Book extends Model {
    public function getAllBooks(): array {
        $stmt = $this->db->query( 'SELECT * FROM books' );
        return $stmt->fetchALl();
    }

    public function getBookById( int $id ): mixed {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}