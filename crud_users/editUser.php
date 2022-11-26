<?php

  require "../ConnectDB.php";

  $id = $_GET["id_U"];

  $statement = $conn->prepare("SELECT * FROM users WHERE id_U = :id_U LIMIT 1");
  $statement->execute([":id_U" => $id]);

  if ($statement->rowCount() == 0) {
    http_response_code(404);
    echo("HTTP 404 NOT FOUND");
    return;
  }

  $client = $statement->fetch(PDO::FETCH_ASSOC);

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name_U"]) || empty($_POST["balance"]) 
    || empty($_POST["phone"]) 
    || empty($_POST["debited"])) {
      $error = "Porfavor rellene todos los campos.";
    } else {
      $name_U = $_POST["name_U"];
      $lastname1_U = $_POST["lastname1_U"];
      $lastname2_U = $_POST["lastname2_U"];
      $email_U = $_POST["email_U"];
      $debited = $_POST["debited"];
      $address_U = $_POST["address_U"];
      $phone = $_POST["phone"];
      $balance = $_POST["balance"];

      $statement = $conn->prepare("UPDATE users SET name_U = :name_U, lastname1_U = :lastname1_U,
       lastname2_U = :lastname2_U, email_U = :email_U, debited = :debited, 
       address_U = :address_U, phone = :phone, balance = :balance WHERE id_U = :id_U");
      $statement->execute([
        ":id_U" => $id,
        ":name_U" => $_POST["name_U"],
        ":lastname1_U" => $_POST["lastname1_U"],
        ":lastname2_U" => $_POST["lastname2_U"],
        ":email_U" => $_POST["email_U"],
        ":debited" => $_POST["debited"],
        ":address_U" => $_POST["address_U"],
        ":phone" => $_POST["phone"],
        ":balance" => $_POST["balance"],
      ]);

      header("Location: users_table.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
    <!-- bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar informacion del cliente</div>
        <div class="card-body">
          <?php if ($error): ?>
            <p class="text-danger">
              <?= $error ?>
            <?php endif ?>
          <form method="POST" action="editUser.php?id_U=<?= htmlspecialchars($client["id_U"] )?>">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Nombre del Cliente</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["name_U"])?>" id="name_U" type="text" class="form-control" name="name_U" autocomplete="name" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="lastname1_U" class="col-md-4 col-form-label text-md-end">Apellido Paterno</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["lastname1_U"])?>" id="lastname1_U" class="form-control" name="lastname1_U" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="lastname2_U" class="col-md-4 col-form-label text-md-end">Apellido Materno</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["lastname2_U"])?>" id="lastname2_U" class="form-control" name="lastname2_U" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="password_U" class="col-md-4 col-form-label text-md-end">Contraseña</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["password_U"])?>" id="password_U" class="form-control" name="password_U" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="email_U" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["email_U"])?>" id="email_U" class="form-control" name="email_U" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="debited" class="col-md-4 col-form-label text-md-end">Debitado</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["debited"])?>" id="debited" class="form-control" name="debited" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="address_U" class="col-md-4 col-form-label text-md-end">Direccion</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["address_U"])?>" id="address_U" class="form-control" name="address_U" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="phone" class="col-md-4 col-form-label text-md-end">Telefono</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["phone"])?>" id="phone" class="form-control" name="phone" type="tel" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="balance" class="col-md-4 col-form-label text-md-end">Saldo</label>

              <div class="col-md-6">
                <input value="<?= htmlspecialchars($client["balance"])?>" id="balance" class="form-control" name="balance" autofocus>
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
<!-- bootstrap -->
</body>
</html>