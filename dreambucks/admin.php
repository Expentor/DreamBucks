<?php
// este es el apartado del admi y el unico acceso para agregar usuarios nuevos
echo "eres administrador"; 
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
        <table class="clients-table">
            <tr>
                <td>ID</td>
                <td>Numero de cuenta</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Email</td>
            </tr>
            <tr>
                <td>Informacion</td>
                <td>Informacion</td>
                <td>Informacion</td>
            </tr>
        </table>
    </div>
    <a href="Logout.php" class="">Cerrar Sesion</a>
</body>
</html>
