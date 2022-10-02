<?php

    

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <!-- GOOGLE MATERIAL -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,800;1,400;1,500&family=Smooch+Sans:wght@200;300&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../styles/styleHeaderUL.css">
    <link rel="stylesheet" href="../styles/styleLoginUser.css">


</head>
<body>

    <header class="header">
        <div class="container-head logo-nav-container">
            <a href="#" class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Menú</div>
            <nav class="navigation">
                <ul>
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="#">Acerca de</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <div class="texts">
                <h2 class="text-left">Dreambucks</h2>
                <p>
                    Cualquier incoveniente con la aplicación o su cuenta puede comunicarse con el equipo
                    de Dreambucks, si no es posible iniciar sesión, asegurese de estar registrado con su ejecutivo 
                    en turno.
                </p>
            </div>
            <div>
                <div class="form">
                    <input type="text" placeholder="Correo electrónico">
                    <input type="text" placeholder="Contraseña">

                    <button type="submit" class="enter">Iniciar sesión</button>
                    <a href="#">¿Olvidaste tu contraseña?</a>

                    <hr>

                    <button class="executives">Contactos de ejecutivos</button>
                </div>

                <div class="conte-ul">
                    <p class="outside"><span>Maneja tu cuenta de la mejor manera</span>, manten seguras tus 
                        transacciones, ten buen flujo y manejo de tu economia con Dreambucks</p>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../scriptHUL.js"></script>

</body>
</html>