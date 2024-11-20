<?php
class Database {
    public $pdo;

    public function __construct($dsn, $username, $password = null) {
        $this->pdo = new PDO($dsn, $username, $password);
    }
    
    public function query($query) {
        $stmt = $this->pdo->query($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function prepare($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

}