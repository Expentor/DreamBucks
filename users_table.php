<?php

require "./ConnectDB.php";

session_start();

$clients = $conn->query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <link rel="stylesheet" href="./styles/styleCrud.css">
    <title>Pagina de clientes</title>
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
                    <li><a href="Logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="crud-container">

            <?php if ($clients->rowCount() == 0): ?>
                <div class="col-md-4 mx-auto">
                    <div class="card card-body text-center">
                    <p>Todavia no tienes ningun cliente</p>
                    <a href="CreateUser.php">Agrega a tu primer cliente</a>
                </div>
                </div>
            <?php endif?>

            <!-- Se iteran todos los clientes existentes en la base de datos -->
            <table class="content-table">
                    <thead>
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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                <?php foreach ($clients as $client) { ?>
                    <tbody>
                        <tr>
                            <td><p><?= $client["id_U"] ?></p></td>
                            <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["name_U"]) ?></p></td>
                            <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["lastname1_U"]) ?></p></td>
                            <td><p class="card-title text-capitalize"><?= htmlspecialchars($client["lastname2_U"]) ?></p></td>
                            <td><p><?= htmlspecialchars($client["email_U"]) ?></p></td>
                            <td><p><?= htmlspecialchars($client["debited"]) ?></p></td>
                            <td><p><?= htmlspecialchars($client["address_U"]) ?></p></td>
                            <td><p><?= htmlspecialchars($client["phone"]) ?></p></td>
                            <td><p><?= htmlspecialchars($client["balance"]) ?></p></td>
                            <td><a href="editUser.php?id_U=<?= $client["id_U"] ?>" class="btn-edit">Editar</a></td>
                            <td><a href="deleteUser.php?id_U=<?= $client["id_U"] ?>" class="btn-delete">Eliminar</a></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </main>

    <?php

        require "footer.html"

    ?>

  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
  crossorigin="anonymous"></script>
  <!-- bootstrap -->

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="./scriptHUL.js"></script>

</body>
</html>