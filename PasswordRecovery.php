<!-- formulario para recuperar password -->
    <section class="">
        <form method="post" action="PasswordRecovery2.php">
            <h5>recuperar tu password</h5>
            <label for="txtcorreo">Ingresa su correo electronico:</label>
            <input class="" type="email" name="txtcorreo" placeholder="Correo Electronico" id="email" required>

            <input class="" type="submit" name="enviar" value="Ingresar" onclick="javascript: return confirm('deseas enviar tu password a este correo?');">
        </form>
    </section>
