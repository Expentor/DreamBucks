<?php
// codigo para procesar el pago
session_start();
$user= $_SESSION["name_U"]; // nombre del usuario
$id = $_GET['id']; // el id del prestamo

include("ConnectDB.php");

// el dinero que el usuario utiliza para pagar se guarda en esta variable
$deposit =$_POST["pay"];

mysqli_set_charset($connect, "utf8");            

// consulta para encontrar el prestamo que se pagara
$consult = "SELECT * FROM loans WHERE id_L='$id'"; 
$result  = mysqli_query($connect, $consult);

while ($row = mysqli_fetch_row($result)){
?>
<?php 
    $debt= $row[4];// guardamos en una variable lo que le falta por pagar al usuario
    $id_U1 = $row[1]; //guardamos el id del usuario
?>
<?php
}
// se realiza la  simple operacion de resta 
$total = $debt - $deposit;

// actualizamos en la base de datos la nueva info(cuanto le queda por pagar al usuario)
$sql = "UPDATE loans
        SET    total = '$total'
        WHERE  id_L  = '$id'";

if(mysqli_query($connect,$sql)){
    header("location: user.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
} 

// aqui sumamos todos los prestamos del usuario(tanto los abonados como los nuevos) para sacar un total y mostrarselo en la pagina de user.php
$consult = "SELECT SUM(total) as result FROM loans WHERE id_U1 = '$id_U1'";
$result = mysqli_query($connect, $consult);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$debited = $row["result"]; //guardamos en la variable la suma total

//actualizamos la nueva info(la suma total de los pretamos pero actualizada despuesde la operacion)
$sql = "UPDATE users
        SET    debited = '$debited'
        WHERE  name_U='$user'";
if(mysqli_query($connect,$sql)){
    header("location: user.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
} 
?>



