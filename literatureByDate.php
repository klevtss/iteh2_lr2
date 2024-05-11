<?php 
require "connection.php";

$first_date = intval($_POST["first_date"]);
$second_date = intval($_POST["second_date"]);

$cursor = $collection->find(["year" =>['$gte' => $first_date, '$lte' => $second_date]], ["projection" => ["title" => 1, "author" => 1, "year" => 1, '_id' => 0]]);
$result = array();

foreach ($cursor as $item) {
    array_push($result, $item);
    echo "<hr>";
    echo "<li>" . $item["title"] . " " . $item["author"] . " " . $item["year"] . "</li>";
}
echo "<script> localStorage.setItem('storage', '" . json_encode($result) . "');</script>";
?>