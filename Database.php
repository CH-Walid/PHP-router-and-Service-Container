<?php

class Database {
  protected $connection;

  public function __construct($config, $username = 'root', $password = '') {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    $this->connection = new PDO($dsn, $username, $password);
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  public function query($query, $params) {
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }
}