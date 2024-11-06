<?php
class Database {
    public $connection;
    public function __construct($dsn, $username, $password = null) {
        $this->connection = new PDO($dsn, $username, $password);
    }

    public function query($query_string) {
        $query = $this->connection->prepare($query_string);
        $result = $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
   }

   public function singleQuery($query_string) {
    $query = $this->connection->prepare($query_string);
        $result = $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
   }
}