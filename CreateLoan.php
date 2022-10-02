<!-- formulario para crear el prestamo del usuario -->

<section>
        <form method="post" action="Process_Loan.php">

        <label for="name">Ingresa el nombre del cliente:</label>
        <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>

        <label for="password">Ingresa la contraseña del cliente::</label>
        <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>

        <label for="quantity">Ingresa cual sera la cantidad del prestamo:</label>
        <input class="" type="text" name="quantity" placeholder="cantidad" id="quantity" required>

        <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
</section>