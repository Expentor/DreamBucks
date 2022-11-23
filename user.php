<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/styleHeaderUL.css">
        <link rel="stylesheet" href="./styles/styleUser.css">
        <title>User</title>
</head>
<body>

        <header class="header">
        <div class="container-head logo-nav-container">
            <a class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Cerrar Sesion</div>
            <nav class="navigation">
                <ul>
                    <li><a href="Logout.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </div>
        </header>

</body>
</html>

<?php
$connect = mysqli_connect("localhost", "root", "", "dreambucks");
// obtenemos el nombre de usuario con la variable global SESSION
session_start();
$user= $_SESSION["name_U"];

// borramos aquellos prestamos que ya fueron pagados
$delete = "DELETE from loans where total<=1";
if(mysqli_query($connect,$delete)){
}else{
        echo "Error: " . $delete . "<br>" . mysqli_error($connect);
}

mysqli_set_charset($connect, "utf8");            

// accedemos a la tabla usuarios para obtener informacion de nuestro usuario 
$consult = "SELECT * FROM users WHERE name_U='$user'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<div class="advertisements">
<h1>Prestamos</h1><br>
<?php   
        $id = $row[0]; //guardamos su id en una variable
        $balance = $row[10]; //guardamos el saldo del usuario
        if($balance<0){
                echo '
                <div class="alert"><h1>⚠️</h1></div>
                <div class="bad">
                <h4>Actualmente usted tiene una deuda sin pagar lo cual afectara a su historial crediticio.<h4>
                <h4>Ocasionando problemas para futuros prestamos tanto en dreambucks como en cualquier otra institucion
                el saldo pendiente para recuperar sus privilegios y no dañar mas su historial creticio es de: ' .'$' . abs($balance) . '<br></h4></div>';
        } else {
                echo '<h4 class="text">Cuenta con un saldo de: $' . $row[10] . "<br></h4>"; //el saldo del cliente
        }
        
        echo '<h4 class="text">Usted debe un total de: $'. $row[6] . "<br></h4>";  //lo que debe el usuario
        
?></div>

<?php
}

// accdedemos a la tabla de prestamos y utilizamos el id del usuario para encontrar sus prestamos y mostrar la informacion
$consult = "SELECT * FROM loans WHERE id_U1='$id'"; 
$result  = mysqli_query($connect, $consult);
while ($row2 = mysqli_fetch_row($result)){
?>

<div class="container_a">
   <?php   
   echo '<p class="a">Fecha del prestamo: </p>'                 .$row2[2] .      "<br>";
   echo '<p class="a">Cantidad prestada: </p>'                  .$row2[3] .      "<br>" ;
   echo '<p class="a">El porcentaje de interes fue del: </p>'   .$row2[4] . '%' ."<br>";
   echo '<p class="a">Faltante de pagar por este prestamo: </p>'.$row2[8] .      "<br>";
   echo '<p class="a">Lapsos solicitados: </p>'                 .$row2[6] .      "<br>";
   ?>

<?php  

 //DECLARAR variables provenientes de la tabla loans
 $lapses = $row2[6];    // guardo los lapsos en esta variable
 $dateLoan = $row2[2]; //guardamos en una variable la fecha en la que se hizo el prestamo 
 $id_U = $row2[1]; //identificacion del usuario
 $idloan = $row2[0]; //identificacion del prestamo
 $quota = $row2[7]; //la cuota que se pagara cada mes
 $due = $row2[8]; //lo que actualmente debe de este prestamo el usuario
 $iterator = $row2[9]; //el iterador que ayuda a que cada mes no se ejecute 2 veces la misma accion o peticion
 $total = $row2[5]; //el total del prestamo

 $n = 0;
 $loan = date_create($dateLoan);//  creamos la fecha de la creacion del prestamo obtenida de la base de datos
 $date = date("Y-m-d"); //esta es la fecha que sera personalizada 
 $custom_date = strtotime('+'. $n . 'months', strtotime($date)); // AQUI SE MODIFICA LA FECHA, esta fecha se personaliza por intenciones de la presentacion, (demostrar que sucede si avanzamos en el tiempo)
 $custom_date = date("Y-m-d", $custom_date); //convertimos la fecha modificada en segundos a una fecha legible o en un formato comun años/meses/dias
//  if($n <= $lapses){
         $dayPay = strtotime('+ 1 months',strtotime($custom_date)); //el dia de pago tiene que ser un mes depues a la fecha en la que se creo el prestamo y mostrar el ultimo dia para pagar
//  } else {
//         $dayPay = strtotime('+' . $lapses . 'months',strtotime($dateLoan)); 
//  }
 $custom_date = date_create($custom_date); //creamos la fecha ya personalizada
 $interval = date_diff($loan, $custom_date);// la diferencia entre ambas fechas (la del prestamo y la personalizada)
 
 $newDue = $due + $quota; //la deuda actualizada (es la suma de lo que debe mas la nueva quota del nuevo mes)
 $newDue2 = $due - $quota; //el resultado de restalerle una quota al la deduda como si fuera pagada se utiliza cuando hacemos un pago forzado 
 $NegativeBalance = $balance - $quota;// se guarda en esta variable el resultante de descontarle una cuota entera a lo que tiene el usuario guardado (castigo o saldo negativa)                  
 $Newtotal = $total - $quota; //la deuda actualizada (el resultado de restalerle una quota al la deduda como si fuera pagada)se utiliza cuando hacemos un pago forzado

 //actualizamos que lo que debe el usuario se le sumara una quota
 $update_due  = "UPDATE loans
          SET    due = '$newDue'
          WHERE  id_L  = '$idloan'"; 

//le restaremos al usuario una quota como castigo por no pagar a tiempo es como un cobro forzoso
 $subtract_balance = "UPDATE users
          SET    balance = '$NegativeBalance'
          WHERE  id_U  = '$id_U'";

//despues de realizar el pago forzado por ende la cuota fue pagada y tiene que descontarse
 $forced_payment ="UPDATE loans
          SET    due = '$newDue2'
          WHERE  id_l  = '$idloan'";

//le restamos al total la cuota que fue descontada en el pago forzoso 
$subtract_total ="UPDATE loans
          SET    total = '$Newtotal'
          WHERE  id_l  = '$idloan'";

        //si han transucirrido 30 dias, el iterator aun no se a actualizado y aun no se superan los lapsos solicitados  se realiza lo siguiente
        if($interval->format('%m') == $iterator && $interval->format('%m') <= $lapses){  ;
                $iterator2 = $iterator + 1;

                $update_iterator = "UPDATE loans
                SET    months = '$iterator2'
                WHERE  id_l  = '$idloan'";

                if($interval->format('%m') != 0){
                        if(mysqli_query($connect,$update_due)){ //si ha pasado un mes y debe menos de dos quotas sumadas se ejecuta la suma de la nueva quota
                        } else {
                        echo "Error: " . $update_due . "<br>" . mysqli_error($connect);
                        }           
                }
                if(mysqli_query($connect,$update_iterator)){ //actualizamos el iterador para que no suceda nuevos cambios hasta el siguiente mes  
                } else {
                        echo "Error: " . $update_iterator . "<br>" . mysqli_error($connect);
                        }     
                              
        }

        if($due > $quota){
                ?>
                <div class="alert"><h1>⚠️</h1></div>
                <div class="bad"> <?php
                echo '<p class="a">Usted a acomulado dos cuotas sin pagar, tendremos que automaticamente descontarlo de su cuenta </p><br> ';
                ?></div><?php
   
   
                if(mysqli_query($connect,$subtract_balance)){ //ejecutamos la resta de su cuenta
                } else {
                        echo "Error: " . $subtract_balance . "<br>" . mysqli_error($connect);
                        }
                if(mysqli_query($connect,$forced_payment)){ //ejecutamos el pago forzoso lo cual indica que pago una parte de un prestamo
                } else {
                        echo "Error: " . $forced_payment . "<br>" . mysqli_error($connect);
                        }
                if(mysqli_query($connect,$subtract_total)){
                } else {
                        echo "Error: " . $subtract_total . "<br>" . mysqli_error($connect);
                        }      
        }

           
        echo '<p class="a">Ultima fecha para pagar la cuota actual: </p>' . date('Y-m-d',$dayPay) . "<br>";
        echo '<p class="a">Este mes usted tiene que pagar esta cantidad : </p>' . $row2[8] . '<br>';
        echo  $interval->format('%m') . '/////' . $iterator;
        
        ?>

        
<br>
<!--
<button class="pay">Prueba</button><br> 
-->
<button class="pay" onclick="location.href='Pay.php?id=<?php echo $row2[0]?>'">Pagar</button><br> 
<button class="pay" onclick="location.href='tabla.php?id=<?php echo $row2[0]?>'">Mostrar tabla de amortizacion</a><br> 
</div>


<?php

}
// aqui sumamos todos los prestamos del usuario(tanto los abonados como los nuevos) para sacar un total y mostrarselo en la pagina
$consult = "SELECT SUM(total) as result FROM loans WHERE id_U1 = '$id'"; //el id del usaurio lo obtuve de la consulta row[0] 
$result = mysqli_query($connect, $consult);
$row3 = mysqli_fetch_array($result, MYSQLI_ASSOC);

$debited = $row3["result"]; //guardamos en la variable la suma total

//actualizamos la nueva info(la suma total de los pretamos)
$update_debited = "UPDATE users
        SET    debited = '$debited'
        WHERE  name_U='$user'";
if(mysqli_query($connect,$update_debited)){
} else {
echo "Error: " . $update_debited . "<br>" . mysqli_error($connect);
}    

?>