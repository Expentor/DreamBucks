<?php
include("ConnectDB.php");
// obtenemos el nombre de usuario con la variable global SESSION
session_start();
$user= $_SESSION["name_U"];

// borramos aquellos prestamos que ya fueron pagados
$delete = "DELETE from loans where total<=0";

if(mysqli_query($connect,$delete)){
}else{
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_set_charset($connect, "utf8");            

// accedemos a la tabla usuarios para obtener informacion de nuestro usuario 
$consult = "SELECT * FROM users WHERE name_U='$user'"; 
$result  = mysqli_query($connect, $consult);

while ($row = mysqli_fetch_row($result)){
?>
<?php   
        echo 'usted debe un total de: '. $row[4]; //lo que debe el usuario
        $id = $row[0]; //guardamos su id en una variable 
?><br><br>
<?php
}

// accdedemos a la tabla de prestamos y utilizamos el id del usuario para encontrar sus prestamos y mostrar la informacion
$consult = "SELECT * FROM loans WHERE id_U1='$id'"; 
$result  = mysqli_query($connect, $consult);

while ($row2 = mysqli_fetch_row($result)){
?>
 
 <?php  echo 'fecha del prestamo: '. $row2[0];  ?> <br>
 <?php   echo 'cantidad prestada: ' . $row2[2]; ?> <br>
 <?php  echo 'el porcentaje de interes fue del: '. $row2[3] . '%';?> <br>
 <?php  echo 'faltante por pagar: '.   $row2[4];?><br>
 <a href="Pay.php?id=<?php echo $row2[5]?>">pagar</a> 
 <br><br><br>
<?php
}

?>


<br>
<a href="Logout.php" class="">Cerrar Sesion</a>
