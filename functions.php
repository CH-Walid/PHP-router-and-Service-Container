<?php

function URIis($uri) {
  return parse_url($_SERVER['REQUEST_URI'])['path'] === $uri;
}