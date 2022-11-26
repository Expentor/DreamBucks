<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleMenuAdmin.css">
    <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <title>Ejecutivo</title>
</head>
<body>
    
    <header class="header">
        <div class="container-head logo-nav-container">
            <a href="#" class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Menú</div>
            <nav class="navigation">
                <ul>
                    <li><a href="Logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <div class="container_cards">

            <div class="card">
                <div class="cover">
                    <img src="./images/op-loan.jpg" alt="">
                    <div class="img_back"></div>
                </div>
                <div class="description">
                    <h2>Asignar prestamo</h2>
                    <p>Asigne un prestamo al cliente, asignando a que cliente se desea asignar, cual es la cantidad de prestamos y a que plazos se debera de pagar.</p>
                    <a href="CreateLoan.php" class=>Asignar</a>
                </div>
            </div>

            <div class="card">
                <div class="cover">
                    <img src="./images/op-account.jpg" alt="">
                    <div class="img_back"></div>
                </div>
                <div class="description">
                    <h2>Crear cuenta</h2>
                    <p>Cree una cuenta Dreambucks a un nuevo cliente junto con todos sus datos correspondientes.</p>
                    <a href="Register_U.php" class=>Crear</a>
                </div>
            </div>

            <div class="card">
                <div class="cover">
                    <img src="./images/op-deposit.jpg" alt="">
                    <div class="img_back"></div>
                </div>
                <div class="description">
                    <h2>Abonar saldo</h2>
                    <p>Abone saldo al cliente para la posibilidad de que pague sus prestramos.</p>
                    <a href="Credit_Recharge.php" class=>Abonar</a>
                </div>
            </div>

            <div class="card">
                <div class="cover">
                    <img src="./images/op-crud.jpg" alt="">
                    <div class="img_back"></div>
                </div>
                <div class="description">
                    <h2>Administrar clientes</h2>
                    <p>Administre sus clientes para tener al alcance información o modificable o eliminación de cuentas.</p>
                    <a href="./users_table.php" class=>Administrar</a>
                </div>
            </div>

        </div>
        
    </main>

    <?php

        require "footer.html"

    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./scriptHUL.js"></script>

</body>
</html>