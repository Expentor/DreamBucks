<!-- formulario para recargar saldo/dinero -->

<section>
        <form method="post" action="Process_Recharge.php">

        <label for="name">Ingresa tu nombre:</label>
        <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>
        <br>

        <label for="password">Ingresa tu contraseña:</label>
        <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>
        <br>

        <label for="quantity">Ingresa cuanto depositaras:</label>
        <input class="" type="text" name="quantity" placeholder="cantidad" id="quantity" required>

        <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
</section>