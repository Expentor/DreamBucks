<?php

// conectare a base de datos
//$connect = mysqli_connect("localhost", "root", "", "dreambucks");

$host = "localhost";
$database = "dreambucks";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  // foreach ($conn->query("SHOW DATABASES") as $row) {
  //  print_r($row);
  //}
  //die();
} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}

?>