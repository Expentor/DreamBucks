<<<<<<< HEAD
<?php
include("ConnectDB.php");
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
<?php   
        $id = $row[0]; //guardamos su id en una variable
        $balance = $row[8]; //guardamos el saldo del usuario
        if($balance<0){
                echo "actualmente usted tiene una deuda sin pagar lo cual afectara a su historial crediticio
                .<br> ocasionando problemas para futuros prestamos tanto en dreambucks como en cualquier otra institucion <br> <br>
                el saldo pendiente para recuperar sus privilegios y no dañar mas su historial creticio es de: " .'$' . abs($balance) . '<br>';
        } else {
                echo 'cuentas con un saldo de: $' . $row[8] . "<br>"; //el saldo del cliente
        }
        
        echo 'usted debe un total de: $'. $row[4] . "<br>";  //lo que debe el usuario
        
?><br><br>
<?php
}

// accdedemos a la tabla de prestamos y utilizamos el id del usuario para encontrar sus prestamos y mostrar la informacion
$consult = "SELECT * FROM loans WHERE id_U1='$id'"; 
$result  = mysqli_query($connect, $consult);
while ($row2 = mysqli_fetch_row($result)){
?>
 <?php  
   echo 'fecha del prestamo: '                  .$row2[0] .      "<br>";
   echo 'cantidad prestada: '                   .$row2[2] .      "<br>" ;
   echo 'el porcentaje de interes fue del: '    .$row2[3] . '%' ."<br>";
   echo 'faltante de pagar por este prestamo: $'.$row2[4] .      "<br>";
   echo 'lapsos solicitados: '                  .$row2[6] .      "<br>";
 
 //DECLARAR variables provenientes de la tabla loans
 $lapses = $row2[6];    // guardo los lapsos en esta variable
 $dateLoan = $row2[0]; //guardamos en una variable la fecha en la que se hizo el prestamo 
 $id_U = $row2[1]; //identificacion del usuario
 $idloan = $row2[5]; //identificacion del prestamo
 $quota = $row2[7]; //la cuota que se pagara cada mes
 $due = $row2[8]; //lo que actualmente debe de este prestamo el usuario
 $iterator = $row2[9]; //el iterador que ayuda a que cada mes no se ejecute 2 veces la misma accion o peticion
 $total = $row2[4]; //el total del prestamo

 $n = 3;
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
                echo 'usted a acomulado dos cuotas sin pagar, tendremos que automaticamente descontarlo de su cuenta<br> ';

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
        echo 'ultima fecha para pagar la cuota actual: ' . date('Y-m-d',$dayPay) . "<br>";
        echo 'este mes usted tiene que pagar esta cantidad : ' . $row2[8] . '<br>';
        echo  $interval->format('%m') . '/////' . $iterator;
 ?>
<br>
 <a href="Pay.php?id=<?php echo $row2[5]?>">pagar</a><br> 

 <br><br><br>
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


<br>
<a href="Logout.php" class="">Cerrar Sesion</a>



=======
<?php
include("ConnectDB.php");
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
<?php   
        $id = $row[0]; //guardamos su id en una variable
        $balance = $row[8]; //guardamos el saldo del usuario
        if($balance<0){
                echo "actualmente usted tiene una deuda sin pagar lo cual afectara a su historial crediticio
                .<br> ocasionando problemas para futuros prestamos tanto en dreambucks como en cualquier otra institucion <br> <br>
                el saldo pendiente para recuperar sus privilegios y no dañar mas su historial creticio es de: " .'$' . abs($balance) . '<br>';
        } else {
                echo 'cuentas con un saldo de: $' . $row[8] . "<br>"; //el saldo del cliente
        }
        
        echo 'usted debe un total de: $'. $row[4] . "<br>";  //lo que debe el usuario
        
?><br><br>
<?php
}

// accdedemos a la tabla de prestamos y utilizamos el id del usuario para encontrar sus prestamos y mostrar la informacion
$consult = "SELECT * FROM loans WHERE id_U1='$id'"; 
$result  = mysqli_query($connect, $consult);
while ($row2 = mysqli_fetch_row($result)){
?>
 <?php  
   echo 'fecha del prestamo: '                  .$row2[0] .      "<br>";
   echo 'cantidad prestada: '                   .$row2[2] .      "<br>" ;
   echo 'el porcentaje de interes fue del: '    .$row2[3] . '%' ."<br>";
   echo 'faltante de pagar por este prestamo: $'.$row2[4] .      "<br>";
   echo 'lapsos solicitados: '                  .$row2[6] .      "<br>";
 
 //DECLARAR variables provenientes de la tabla loans
 $lapses = $row2[6];    // guardo los lapsos en esta variable
 $dateLoan = $row2[0]; //guardamos en una variable la fecha en la que se hizo el prestamo 
 $id_U = $row2[1]; //identificacion del usuario
 $idloan = $row2[5]; //identificacion del prestamo
 $quota = $row2[7]; //la cuota que se pagara cada mes
 $due = $row2[8]; //lo que actualmente debe de este prestamo el usuario
 $iterator = $row2[9]; //el iterador que ayuda a que cada mes no se ejecute 2 veces la misma accion o peticion
 $total = $row2[4]; //el total del prestamo

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
                echo 'usted a acomulado dos cuotas sin pagar, tendremos que automaticamente descontarlo de su cuenta<br> ';

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
        echo 'ultima fecha para pagar la cuota actual: ' . date('Y-m-d',$dayPay) . "<br>";
        echo 'este mes usted tiene que pagar esta cantidad : ' . $row2[8] . '<br>';
        echo  $interval->format('%m') . '/////' . $iterator;
 ?>
<br>
 <a href="Pay.php?id=<?php echo $row2[5]?>">pagar</a><br> 

 <br><br><br>
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


<br>
<a href="Logout.php" class="">Cerrar Sesion</a>



>>>>>>> 489a8dd2e8326661ba09819801aaab03f573da98
