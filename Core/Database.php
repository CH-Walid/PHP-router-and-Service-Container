<?php

namespace Core;

use PDO;

class Database {
  protected $connection;
  protected $stmt;

  public function __construct($config, $username = 'root', $password = '') {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

    $this->connection = new PDO($dsn, $username, $password);
    $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  public function query($query, $params = []) {
    $this->stmt = $this->connection->prepare($query);
    $this->stmt->execute($params);
    return $this;
  }

  public function find() {
    return $this->stmt->fetch();
  }

  public function findOrFail() {
    $result = $this->find();
    if(!$result) {
      abort();
    }
    return $result;
  }

  public function get() {
    return $this->stmt->fetchAll();
  }
}