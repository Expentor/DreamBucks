<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styleForms.css">
        <link rel="stylesheet" href="./styles/styleHeaderUL.css">
        <link rel="stylesheet" href="./styles/styleAlert.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

<div class="confirmation show">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">Saldo ingresado correctamente</span>
    <span class="close-btn">
        <span class="fas fa-times"></span>
    </span>
</div>

<?php

        require "footer.html"

?>

<script>
    $('.close-btn').click(function(){
        $('.confirmation').addClass("hide");
        $('.confirmation').removerClass("show");
    }); 
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./scriptHUL.js"></script>