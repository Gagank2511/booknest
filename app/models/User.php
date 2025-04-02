<?php

class User extends Model
 {
    public function getAllUsers(): array
 {
        try {
            $stmt = $this->db->query( 'SELECT * FROM users' );
            return $stmt->fetchAll( PDO::FETCH_ASSOC );
        } catch ( PDOException $e ) {
            error_log( 'Database error: '. $e->getMessage() );
            return[];
        }
    }

    public function getUserById( int $id ): ?array
 {
        try {
            $stmt = $this->db->prepare( 'SELECT * FROM users WHERE id = :id' );
            $stmt->execute( [ 'id' => $id ] );
            return $stmt->fetch( PDO::FETCH_ASSOC ) ?: null;
        } catch( PDOException $e ) {
            error_log( 'Database error: ' . $e->getMessage() );
            return null;
        }
    }

    public function findUserByEmail( string $email ): mixed
 {
        try {
            $stmt = $this->db->prepare( 'SELECT * FROM users WHERE email = :email' );
            $stmt->execute( [ 'email' => $email ] );
            return $stmt->fetch( PDO::FETCH_ASSOC )?: null;
        } catch( PDOException $e ) {
            error_log( 'Database error: ' . $e->getMessage() );
            return null;
        }
    }

    public function login( string $email, string $password )
 {
        $user = $this->findUserByEmail( $email );
        
        if ( $user && password_verify( $password, $user[ 'password' ] ) ) {
            return $user;
        }

        return false;
    }

    public function register( string $name, string $email, string $password )
 {
        // Check if user already exists
        if ( $this->findUserByEmail( $email ) ) {
            return false;
            // Email already taken
        }

        // Hash the password
        $hashedPassword = password_hash( $password, PASSWORD_DEFAULT );

        try {
            $stmt = $this->db->prepare( 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)' );
            $stmt->bindParam( ':name', $name, PDO::PARAM_STR );
            $stmt->bindParam( ':email', $email, PDO::PARAM_STR );
            $stmt->bindParam( ':password', $hashedPassword, PDO::PARAM_STR );
            return $stmt->execute();
        } catch ( PDOException $e ) {
            error_log( 'Database error: ' . $e->getMessage() );
            return false;
        }
    }
}