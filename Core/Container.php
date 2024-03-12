<?php

namespace Core;
use Exception;

class Container {
  protected $bindings = [];

  public function bind($key, $resolver) { // add
    $this->bindings[$key] = $resolver;
  }

  public function resolve($key) {
    if(! array_key_exists($key, $this->bindings)) {
      throw new Exception("Key not found: {$key}");
    }

    return $this->bindings[$key]();
  }
}

?>