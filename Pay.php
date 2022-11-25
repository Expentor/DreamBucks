<!-- formlario para enviar un pago -->
<?php
if (!isset($_SESSION["id_A"])) {
        header("Location: index.php");
        return;
      }
?>
<form method="post" action="Process_Pay.php?id=<?php echo $_GET['id']?>">
        <label for="pay">Ingresa cantidad:</label>
        <input class="" type="text" name="pay" placeholder="dinero" id="pay" required>

<input class="buttons" type="submit" name="" value="Ingresar">
</form>