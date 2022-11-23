<?php

// conectare a base de datos
//$connect = mysqli_connect("localhost", "root", "MS2002hector", "dreambucks5");

$host = "localhost";
$database = "dreambucks5";
$user = "root";
$password = "MS2002hector";

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