<!-- formulario para crear el prestamo del usuario -->

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styleForms.css">
        <link rel="stylesheet" href="./styles/styleHeaderUL.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
                        <li><a href="Register_U.php">Crear cuenta</a></li>
                        <li><a href="Credit_Recharge.php">Abonar saldo</a></li>
                        <li><a href="users_table.php">Administrar</a></li>
                        <li><a href="Logout.php">Cerrar sesión</a></li>
                        </ul>
                </nav>
                </div>
        </header>

        <main>
                <form method="post" action="Process_Loan.php" class="form">
                        <h2 class="form-title">Ingrese datos del prestamo</h2>

                        <div class="form-container">

                                <div class="group">
                                        <input class="form-input" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="15" id="name" placeholder=" " required>
                                        <label for="name" class="label">Nombre</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="password" name="password" maxlength="20" autocomplete="new-password" id="password"  placeholder=" " required>
                                        <label for="password" class="label">Contraseña</label>
                                        <span class="form-line"></span>
                                </div>

                                <div class="group">
                                        <input class="form-input" type="text" name="quantity" id="quantity"  placeholder=" " required>
                                        <label for="quantity" class="label">Cantidad</label>
                                        <span class="form-line"></span>
                                </div>

                                <p>Lapsos</p>
                                <div class="group-radio">
                                        <input class="radio" type="radio" name="lapses" id="lapses" value="3" required>
                                        <label for="3"> 3 </label>
                                        <input class="radio" type="radio" name="lapses" id="lapses" value="6" required>
                                        <label for="6"> 6 </label>
                                        <input class="radio" type="radio" name="lapses" id="lapses" value="12" required>
                                        <label for="12"> 12 </label>
                                        <input class="radio" type="radio" name="lapses" id="lapses" value="24" required>
                                        <label for="24"> 24 </label>
                                </div>

                                <input class="form-submit" type="submit" value="Ingresar">

                                <script>
                                              
                                </script>

                        </div>
                </form>
        </main>

        <button>Alerta</button>

<?php

?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="./scriptHUL.js"></script>

        <!--<main>
                <form method="post" action="Process_Loan.php">

                <label for="name">Ingrese el nombre del cliente</label>
                <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>
                <br>

                <label for="password">Ingrese la contraseña del cliente</label>
                <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>
                <br>

                <label for="quantity">Ingrese cual sera la cantidad del prestamo</label>
                <input class="" type="text" name="quantity" placeholder="cantidad" id="quantity" required>

                <p>Ingrese en cuantos lapsos decide pagar este prestamo </p>
                <input class="" type="radio" name="lapses" id="lapses" value="3" required>
                <label for="3"> 3 </label>
                <br>
                <input class="" type="radio" name="lapses" id="lapses" value="6" required>
                <label for="6"> 6 </label>
                <br>
                <input class="" type="radio" name="lapses" id="lapses" value="12" required>
                <label for="12"> 12 </label>
                <br>
                <input class="" type="radio" name="lapses" id="lapses" value="24" required>
                <label for="24"> 24 </label>
                <br>


                <input class="buttons" type="submit" name="" value="Ingresar">
                </form>
        </main>-->


</body>
</html>