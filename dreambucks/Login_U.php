<!DOCTYPE html>
<html>
<!-- LOGIN DEL CLIENTE O USUARIO O NORMAL -->
    <head>
        <title >INICIAR SESION DEL CLIENTE</title>
        <?php   ?>
        
    <div class=>
        <section id="">
            <center><form action="Validate_U.php" method="POST">
                    <h5>Iniciar Sesion</h5>

                    <label for="name"> Usuario:</label><br>
                    <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="Ingrese su Usuario" id="name" required>
    
                    <label for="password">Contraseña</label>
                    <input class="" type="password" name="password" placeholder="Ingrese Contraseña" id="password" required>

                    <button type="submit" class="Boton" name="enviar" value="Login_U" >Iniciar</button>
            </center>
        
            <center><form>
                    <p class="Text"><a href="Register_U.php" style ="text-decoration:none">¿el cliente aun no tiene una cuenta? </a></p>
                    <p class="Text"><a href="PasswordRecovery.php" style ="text-decoration:none">¿el cliente olvido su contraseña? </a></p>
                </hr >
            </center>
        </section>
    </div> 

</html>
