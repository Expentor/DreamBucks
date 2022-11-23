<?php
//en caso de error
//$connect = mysqli_connect("localhost", "root", "", "dreambucks");



// conectare a base de datos
$host = "localhost";
$database = "dreambucks";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  // foreach ($conn->query("SHOW DATABASES") as $row) {
  // print_r($row);
  // }
  // die();
} catch (PDOException $e) {
  die("PDO Connection Error: " . $e->getMessage());
}