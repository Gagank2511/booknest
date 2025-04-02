<?php

class BookCollection extends Model {
    private const GET_ALL_BOOKS_QUERY = 'SELECT * FROM books';
    public function getAllBooks(): array {
        $stmt = $this->db->query( SELF:: GET_ALL_BOOKS_QUERY);
        return $stmt->fetchALl(PDO::FETCH_ASSOC);
    }

    public function getBookById( $id ) {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function addBook(string $title, string $author, string $description, float $price): void{
        $stmt = $this->db->prepare("INSERT INTO books (title, author, description, price) VALUES (:title, :author, :description, :price)");
        $stmt->execute(['title' => $title, 'author' => $author, 'description' => $description, 'price' => $price]);
    }

    public function searchBooks(string $searchTerm): array {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE title LIKE :search OR author LIKE :search2");
        $stmt->execute(['search' => '%' . $searchTerm . '%', 'search2' => '%' . $searchTerm . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteBook(int $id): void{
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}