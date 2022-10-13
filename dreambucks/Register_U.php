<!-- registrar usuarios o clientes nuevos -->
<section>
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
</section>