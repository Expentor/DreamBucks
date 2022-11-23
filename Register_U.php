<!-- registrar usuarios o clientes nuevos -->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styleForms.css">
        <link rel="stylesheet" href="./styles/styleHeader.css">
        <title>Prestamo</title>
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
                        <li><a href="Credit_Recharge.php">Abonar saldo</a></li>
                        <li><a href="users_table.php">Administrar</a></li>
                        <li><a href="Logout.php">Cerrar sesión</a></li>
                        </ul>
                </nav>
                </div>
        </header>

        <main>
                <form method="post" action="CreateUser.php" class="form">
                        <h2 class="form-title">Ingrese datos del usuario</h2>

                        <div class="form-container">

                                <div class="group">
                                        <input class="form-input" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="15" id="name" placeholder=" " required>
                                        <label for="name" class="label">Nombre</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input  id="lastname1_U" class="form-input" name="lastname1_U" placeholder=" " autofocus>
                                        <label for="lastname1_U" class="label">Apellido Paterno</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input id="lastname2_U" class="form-input" name="lastname2_U" placeholder=" " autofocus>
                                        <label for="lastname2_U" class="label">Apellido Materno</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="password" name="password" maxlength="20" id="password"  placeholder=" " required>
                                        <label for="password" class="label">Contraseña</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="email" name="email" placeholder=" " id="email" maxlength="20" required>
                                        <label class="label" for="email">Correo electrónico</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="text" name="address" maxlength="20" placeholder=" " id="address" required>
                                        <label for="address" class="label">Dirección</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="text" name="phone" maxlength="20" placeholder=" " id="phone" required>
                                        <label for="phone" class="label">Telefono</label>
                                </div>

                                <input class="form-submit" type="submit" value="Ingresar">
                                <a class="form-submit" href="Login_U.php">¿Quieres acceder a un usuario registrado?</a>

                        </div>
                </form>
        </main>

<?php

        require "footer.html"

?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./scriptHUL.js"></script>

</body>

<!--<section>
        <form method="post" action="CreateUser.php">
        <h5>Registrate</h5>
        <label for="name">Ingresa su nombre:</label>
        <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>

        <label for="email">Ingresa su correo electrónico:</label>
        <input class="" type="email" name="email" placeholder="Correo electrónico" id="email" required>

        <label for="password">Ingresa su contraseña:</label>
        <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>

        <label for="address">Ingresa su direccion:</label>
        <input class="" type="text" name="address" placeholder="direccion" id="address" required>

        <label for="phone">Ingresa su telefono:</label>
        <input class="" type="text" name="phone" placeholder="telefono" id="phone" required>

        <input class="buttons" type="submit" name="" value="Ingresar">
        <p><a href="Login_U.php">¿quieres acceder a un usuario registrado ? </a></p> 
        </form>
</section>-->