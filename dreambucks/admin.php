<?php
// este es el apartado del admi y el unico acceso para agregar usuarios nuevos
echo "eres administrador"; 
$clients = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
</head>
<body>
    <a href="Register_U.php" class="">Agregar un nuevo cliente</a>
    <div>
        <?php if($clients->rowCount() == 0): ?>
            <div>
                <p>No tiene ningun cliente agregado aun</p>
            </div>
        <?php endif ?>

        <?php foreach ($clients as $client) { ?>
        <table class="clients-table">
            <tr>
                <th>ID</th>
                <th>Numero de cuenta</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?= $client["id"] ?></td>
                <td><?= $client["cuenta"] ?></td>
                <td><?= $client["nombre"] ?></td>
                <td><?= $client["apellidos"] ?></td>
                <td><?= $client["email"] ?></td>
            </tr>
        </table>
        <?php } ?>
    </div>
    <a href="Logout.php" class="">Cerrar Sesion</a>
</body>
</html>
