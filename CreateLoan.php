<!-- formulario para crear el prestamo del usuario -->

<section>
        <form method="post" action="Process_Loan.php">

        <label for="name">Ingresa el nombre del cliente:</label>
        <input class="" type="text" name="name" pattern="[a-zA-Z0-9]+" maxlength="8" placeholder="nombre" id="name" required>
        <br>

        <label for="password">Ingresa la contraseña del cliente:</label>
        <input class="" type="password" name="password" maxlength="20" autocomplete="new-password" placeholder="Contraseña" id="password" required>
        <br>

        <label for="quantity">Ingresa cual sera la cantidad del prestamo:</label>
        <input class="" type="text" name="quantity" placeholder="cantidad" id="quantity" required>

        <p>Ingresa en cuantos lapsos decide pagar este prestamo: </p>
        <input class="" type="radio" name="lapses" id="lapses" value="3" required>
        <label for="3"> 3 </label>
        <br>
        <input class="" type="radio" name="lapses" id="lapses" value="6" required>
        <label for="6"> 6 </label>
        <br>
        <input class="" type="radio" name="lapses" id="lapses" value="12" required>
        <label for="12"> 12 </label>
        <br>
        <input class="" type="radio" name="lapses" id="lapses" value="24" required>
        <label for="24"> 24 </label>
        <br>


        <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
</section>