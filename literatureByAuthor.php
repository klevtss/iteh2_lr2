<?php 
require "connection.php";

$author = $_POST["author"];
$cursor = $collection->find(["author" => $author],["projection" => ["title" => 1,"author" => 1, "year" => 1, "_id" => 0]]);
$result = array();

echo "Автор  " . $author;
foreach ($cursor as $item) {
    array_push($result, $item);
    echo "<hr>";
    echo "<li>" . $item["title"] . " " . $item["author"] . " " . $item["year"] . "</li>";
}
echo "<script> localStorage.setItem('storage', '" . json_encode($result) . "');</script>";
?>