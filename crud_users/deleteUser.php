<?php

require "../ConnectDB.php";

$id = $_GET["id_U"];

$statement = $conn->prepare("DELETE FROM users WHERE id_U = :id_U");
$statement->execute([":id_U" => $id]);

if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
  return;
}

$conn->prepare("DELETE FROM users WHERE id_U = :id_U")->execute([":id_U" => $id]);

header("Location: users_table.php");