<?php

require 'functions.php';

$heading = 'Dashboard';

function dd($element) {
  echo "<pre>";
  var_dump($element);
  echo "</pre>";

  die();
}

require 'views/index.view.php';