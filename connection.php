<?php 
require_once __DIR__."/vendor/autoload.php";

try {
  $collection = (new MongoDB\Client)->resources->literature;
} catch (MongoDB\Driver\Exception\Exception $e) {
  echo "MongoDB Error: " . $e->getMessage();
}
?>