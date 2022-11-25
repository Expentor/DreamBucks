<?php
$id = $_GET['id'];

$info = array();
$mysqli = new mysqli("localhost", "root", "Admin123?", "dreambucks");
$mysqli->set_charset('utf8');
$statement = $mysqli->prepare("SELECT * FROM loans WHERE id_L='$id'" );
$statement->execute();
$resultado = $statement->get_result();
while($row = $resultado->fetch_assoc()) $info[] = $row;
$mysqli->close();

