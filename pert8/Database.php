<?php
class Database {
    public $pdo;
    private $stmt;

    public function __construct($dsn, $username, $password = null) {
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    }

    public function query($sql) {
        $this->stmt = $this->pdo->query($sql);
        $this->stmt->execute();
        return $this;
    }

    public function get() {
        return $this->stmt->fetchAll();
    }

    public function first() {
        return $this->stmt->fetch();
    }
}