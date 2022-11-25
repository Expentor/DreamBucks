<!-- formulario para recargar saldo/dinero -->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styleLoans.css">
        <link rel="stylesheet" href="./styles/styleHeader.css">
        <title>Prestamo</title>
</head>

<header class="header">
        <div class="container-head logo-nav-container">
                <a href="#" class="logo">DREAMBUCKS</a>
                <div class="menu-icon">Menú</div>
                <nav class="navigation">
                        <ul>
                        <li><a href="admin.php">Volver</a></li>
                        <li><a href="CreateLoan.php">Crear prestamo</a></li>
                        <li><a href="Register_U.php">Crear Cuenta</a></li>
                        <li><a href="users_table.php">Administrar</a></li>
                        <li><a href="Logout.php">Cerrar sesión</a></li>
                        </ul>
                </nav>
        </div>
</header>

<main>
        <form method="post" action="Process_credit.php" class="form">
                <h2 class="form-title">Ingrese datos del abono</h2>

                <div class="form-container">

                         <div class="group">
                                 <input class="form-input" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="15" id="name" placeholder=" " required>
                                 <label for="name" class="label">Nombre</label>
                                 <span class="form-line"></span>
                         </div>

                        <div class="group">
                                <input class="form-input" type="password" name="password" maxlength="20" id="password"  placeholder=" " required>
                                <label for="password" class="label">Contraseña</label>
                                <span class="form-line"></span>
                        </div>

                        <div class="group">
                                <input class="form-input" type="text" name="quantity" placeholder=" " id="quantity" required>
                                <label for="quantity" class="label">Deposito</label>
                                <span class="form-line"></span>
                        </div>
                        <input class="form-submit" type="submit" value="Ingresar">

                </div>
        </form>
</main>

<?php

        require "footer.html"

?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./scriptHUL.js"></script>

<!--<section>
        <form method="post" action="Process_credit.php">

        <label for="name">Ingresa tu nombre:</label>
        <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>
        <br>

        <label for="password">Ingresa tu contraseña:</label>
        <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>
        <br>

        <label for="quantity">Ingresa cuanto depositaras:</label>
        <input class="" type="text" name="quantity" placeholder="cantidad" id="quantity" required>

        <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
</section>-->
