<?php

class Database {
  protected $connection;

  public function __construct() {
    $dsn = "mysql:host=localhost;dbname=myapp;charset=utf8mb4";
    $this->connection = new PDO($dsn, 'root');
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  public function query($query) {
    $stmt = $this->connection->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}