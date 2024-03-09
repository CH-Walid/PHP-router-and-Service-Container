<?php

function dd($element) {
  echo "<pre>";
  var_dump($element);
  echo "</pre>";

  die();
}

function URIis($uri) {
  return parse_url($_SERVER['REQUEST_URI'])['path'] === $uri;
}

function authorize($condition, $status = Response::FORBIDDEN) {
  if(!$condition) {
    abort($status);
  }
}