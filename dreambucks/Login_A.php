<!DOCTYPE html>
<html>
<!-- LOGIN DEL ADMI -->
    <head>
        <title >INICIAR SESION DEL ADMIN</title>
        
    <div class=>
        <section id="">
            <center><form action="Validate_A.php" method="POST">
                    <h5>Iniciar Sesion</h5>

                    <label for="id"> identificacion:</label><br>
                    <input class="" type="text" name="id" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="Ingrese su Usuario" id="id" required>
    
                    <label for="password">Contraseña</label>
                    <input class="" type="password" name="password" placeholder="Ingrese Contraseña" id="password" required>

                    <button type="submit" class="Boton" name="enviar" value="Login_U" >Iniciar</button>
            </center>
        </section>
    </div> 

</html>