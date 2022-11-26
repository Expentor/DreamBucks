<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleForms.css">
    <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <title>Document</title>
</head>
<body>

        <header class="header">
                <div class="container-head logo-nav-container">
                <a href="#" class="logo">DREAMBUCKS</a>
                <div class="menu-icon">Menú</div>
                <nav class="navigation">
                        <ul>
                        <li><a href="index.php">Volver</a></li>
                        </ul>
                </nav>
                </div>
        </header>

    <main>
        <form method="post" action="PasswordRecovery2.php" class="form">

            <h2 class="form-title">Recupera tu contraseña</h2>
            
                    <div class="form-container">
                        <div class="group">

                        <input class="form-input" type="email" name="txtcorreo" id="email" maxlength="15" placeholder=" " required>
                        <label class="label" for="txtcorreo">Correo Electronico</label>
                        <span class="form-line"></span>

                        </div>

                        <input class="form-submit" type="submit" name="enviar" value="Ingresar" onclick="javascript: return confirm('¿Desea enviar su nueva contraseña a este correo?');">
                    </div>

        </form>
    </main>
    
    <?php

        require "footer.html"

    ?>

</body>
</html>
        
   