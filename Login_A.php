<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleLoginAdm.css">
    <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <title>Administrador</title>
</head>
<body>
    
<!--SOLO DISEÑO-->


    <header class="header">
        <div class="container-head logo-nav-container">
            <a href="#" class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Menú</div>
            <nav class="navigation">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="Login_U.php">Usuario</a></li>
                    <li><a href="contacts.php">Contactos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
       
       <div class="form-container container">

            <div class="photo-form">

                
            </div>

            <form class="form" action="./Validate_A.php" method="POST">
                    
                <div class="form-text">
                    <h2>Bienvenido de nuevo ejecutivo</h2>
                    <br>
                    <p>Inicie sesión con su cuenta</p>
                    <br>
                </div>

                <div class="input">
                    <label for="user">Número de cuenta</label>
                    <input placeholder="Ingrese su usuario" type="text" id="id" name="id" pattern="[a-zA-Z0-9]+" required>
                </div>
                <div class="input">
                    <label for="password">Contraseña</label>
                    <input placeholder="Ingrese su contraseña" type="password" id="password" name="password" id="password" required>
                </div>

                <div class="forgot-password">
                    <a href="#">¿Olvido su contraseña?</a>
                </div>

                <div class="input">
                    <input type="submit" value="Iniciar" name="enviar">
                </div>

            </form>

       </div> 

    </main>


    <?php

        require "footer.html";

    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./scriptHUL.js"></script>

</body>
</html>