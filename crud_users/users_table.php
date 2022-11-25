<?php
if (!isset($_SESSION["id_A"])) {
  header("Location: index.php");
  return;
}
require "../ConnectDB.php";

session_start();

$clients = $conn->query("SELECT * FROM users WHERE id_A1 = {$_SESSION['id_A']}");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../styles/styleUserTable.css">
    <title>Pagina de clientes</title>
</head>
<body>
<a href="../Register_U.php">Craer cuenta para nuevo cliente</a> <br>
<a href="../admin.php">Regresar a pantalla principal</a> <br>
<div class="container">
<?php if ($clients->rowCount() == 0): ?>
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
        <p>Todavia no tienes ningun cliente</p>
        <a href="../Register_U.php">Agrega a tu primer cliente</a>
      </div>
    </div>
  <?php endif?>
    <!-- Se iteran todos los clientes existentes en la base de datos -->
    <table class="table-primary">
        <tr>
            <th>Tabla de usuarios</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Email</th>
            <th>Debitado</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Saldo</th>
        </tr>
  <?php foreach ($clients as $client) { ?>
    <tr>
        <td><p><?= htmlspecialchars($client["id_U"]) ?></p></td>
        <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["name_U"]) ?></p></td>
        <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["lastname1_U"]) ?></p></td>
        <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["lastname2_U"]) ?></p></td>
        <td><p><?= htmlspecialchars($client["email_U"]) ?></p></td>
        <td><p><?= htmlspecialchars($client["debited"]) ?></p></td>
        <td><p><?= htmlspecialchars($client["address_U"]) ?></p></td>
        <td><p><?= htmlspecialchars($client["phone"]) ?></p></td>
        <td><p><?= htmlspecialchars($client["balance"]) ?></p></td>
        <td><a href="editUser.php?id_U=<?= htmlspecialchars($client["id_U"]) ?>" class="btn btn-secondary mb-2">Edit Contact</a></td>
        <td><a href="deleteUser.php?id_U=<?= htmlspecialchars($client["id_U"]) ?>" class="btn btn-danger mb-2">Delete Contact</a></td>
    </tr>
  <?php } ?>
  </table>
  </div>

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
  crossorigin="anonymous"></script>
  <!-- bootstrap -->
</body>
</html>