<?php

  require "./ConnectDB.php";

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
    if (empty($_POST["name_U"])
    || empty($_POST["phone"]) ) {

      $error = "Porfavor rellene todos los campos.";
    } else {
      $name_U = $_POST["name_U"];
      $lastname1_U = $_POST["lastname1_U"];
      $lastname2_U = $_POST["lastname2_U"];
      $email_U = $_POST["email_U"];
      $address_U = $_POST["address_U"];
      $phone = $_POST["phone"];

      $statement = $conn->prepare("UPDATE users SET name_U = :name_U, lastname1_U = :lastname1_U,
       lastname2_U = :lastname2_U, email_U = :email_U, 
       address_U = :address_U, phone = :phone WHERE id_U = :id_U");
      $statement->execute([
        ":id_U" => $id,
        ":name_U" => $_POST["name_U"],
        ":lastname1_U" => $_POST["lastname1_U"],
        ":lastname2_U" => $_POST["lastname2_U"],
        ":email_U" => $_POST["email_U"],
        ":address_U" => $_POST["address_U"],
        ":phone" => $_POST["phone"],
      ]);

      header("Location: editUserConfirm.php");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <link rel="stylesheet" href="./styles/styleForms.css">
    <title>Editar Usuario</title>
</head>
<body>


<header class="header">
        <div class="container-head logo-nav-container">
            <a href="#" class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Menú</div>
            <nav class="navigation">
                <ul>
                    <li><a href="admin.php">Volver</a></li>
                    <li><a href="CreateLoan.php">Crear prestamo</a></li>
                    <li><a href="Register_U.php">Crear usuario</a></li>
                    <li><a href="Credit_Recharge.php">Abonar saldo</a></li>
                    <li><a href="#">Amortización</a></li>
                    <li><a href="Logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
</header>

<main>
            <?php if ($error): ?>
              <p class="text-danger">
                <?= $error ?>
              <?php endif ?>

            <form method="POST" class="form" action="editUser.php?id_U=<?= $client["id_U"] ?>">
                <h2 class="form-title">Modifique los datos del usuario</h2>

                <div class="form-container">

                  <div class="group">
                    <input value="<?= htmlspecialchars($client["name_U"])?>" id="name_U" type="text" class="form-input" name="name_U" autocomplete="name" placeholder=" " autofocus>
                    <label for="name" class="label">Nombre</label>
                    <span class="form-line"></span>
                  </div>

                  <div class="group">
                    <input value="<?= $client["lastname1_U"]?>" id="lastname1_U" class="form-input" name="lastname1_U" placeholder=" " autofocus>
                    <label for="lastname1_U" class="label">Apellido Paterno</label>
                    <span class="form-line"></span>
                  </div>

                  <div class="group">
                    <input value="<?= $client["lastname2_U"]?>" id="lastname2_U" class="form-input" name="lastname2_U" placeholder=" " autofocus>
                    <label for="lastname2_U" class="label">Apellido Materno</label>
                    <span class="form-line"></span>
                  </div>

                  <div class="group">
                    <input value="<?= $client["email_U"]?>" id="email_U" class="form-input" name="email_U" placeholder=" " autofocus>
                    <label for="email_U" class="label">Correo Electrónico</label>
                    <span class="form-line"></span>
                  </div>
                  
                  <div class="group">
                    <input value="<?= $client["address_U"]?>" id="address_U" class="form-input" name="address_U" placeholder=" " autofocus>
                    <label for="address_U" class="label">Direccion</label>
                    <span class="form-line"></span>
                  </div>    
              
                  <div class="group">
                    <input value="<?= $client["phone"]?>" id="phone" class="form-input" name="phone" type="tel" placeholder=" " autofocus>
                    <label for="phone" class="label">Telefono</label>
                    <span class="form-line"></span>
                  </div>
            
                  <button type="submit" class="form-submit">Editar</button>

                </div>
            </form>
</main>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
crossorigin="anonymous"></script>
<!-- bootstrap -->
</body>
</html>