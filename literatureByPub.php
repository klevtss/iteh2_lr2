<?php 
require "connection.php";

$publisher = $_POST["publisher"];
$cursor = $collection->find(["publisher" => $publisher],["projection" => ["title" => 1,"publisher" => 1, "pages" => 1, "_id" => 0]]);
$result = array();

echo "Видавництво  " . $publisher;
foreach ($cursor as $item) {
    array_push($result, $item);
    echo "<hr>";
    echo "<li>" . $item["title"] . " " . $item["publisher"] . " " . $item["pages"] . "</li>";
}
echo "<script> localStorage.setItem('storage', '" . json_encode($result) . "');</script>";
?>