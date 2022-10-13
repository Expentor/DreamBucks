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
        $balance = $row[8]; 
?><br><br>
<?php
}
// guardamos en una variable la fecha actual pero con la funcion strotime lo convertimos en segundos, debido a que durante la presentacion no pueden esperar a que pasa un mes
// sumaremos los meses necesarios para la presentacion 
$today = strtotime(date('Y-m-d'). "+ 0 month");
// accdedemos a la tabla de prestamos y utilizamos el id del usuario para encontrar sus prestamos y mostrar la informacion
$consult = "SELECT * FROM loans WHERE id_U1='$id'"; 
$result  = mysqli_query($connect, $consult);

while ($row2 = mysqli_fetch_row($result)){
?>
 <?php  echo 'fecha del prestamo: '. $row2[0];  ?> <br>
 <?php  echo 'cantidad prestada: ' . $row2[2]; ?> <br>
 <?php  echo 'el porcentaje de interes fue del: '. $row2[3] . '%';?> <br>
 <?php  echo 'faltante de pagar por este prestamo: '.   $row2[4];?><br>
 <?php  echo 'lapsos solicitados: '.   $row2[6];?><br>
 <?php
 //vale esto es lo dificil. guardamos en una variable la fecha en la que se hizo el prestamo 
 $dateLoan = $row2[0];
 //obtenemos la diferencia entre hoy y la fecha en la que se hizo el prestamo en segundos 
 $difference = $today - strtotime($dateLoan);
 //ahora realizamos esta operacion para determinar a cuantos meses equivale la diferencia anteriormente mencionada 
 $months = $difference / 2628000 ;
 //aqui le sumamos .5 por que al momento de redondear debe redondear hacia arriba siempre 
 $months2 = $months + .5;
 //aqui establecemos el dia que debe de pagar osea la fecha en la que hizo el prestamo mas los meses que han trasncurrido por ello redondea hacia arriba ->
 //indicando que te falta como maximo un mes para pagar como minimo 1 dia 
 $dayPay = strtotime($dateLoan. "+". round($months2). "month"); ?>
<?php  echo 'ultima fecha para pagar la cuota actual: ' . date('Y-m-d',$dayPay)?><br>
 <?php
 $loan = date_create($dateLoan);
 $custom_date = date_create('2022-10-14');
 $interval = date_diff($loan, $custom_date);

 $id_U = $row2[1];
 $idloan = $row2[5];
 $quota = $row2[7];
 $due = $row2[8];
 $newDue = $due + $quota;
 $newDue2 = $due - $quota;
 $NegativeBalance = $balance - $quota;                  
 $n= $interval->format('%m') % 30;
 $sql  = "UPDATE loans
          SET    due = '$newDue'
          WHERE  id_L  = '$idloan'";

 $sql2  = "UPDATE users
          SET    balance = '$NegativeBalance'
          WHERE  id_U  = '$id_U'";

 $sql3  ="UPDATE loans
          SET    due = '$newDue2'
          WHERE  id_l  = '$idloan'";

        if($n==0){
                if($due>0){
                        if($newDue >= $quota * 2){
                                echo 'usted a acomulado dos cuotas sin pagar, tendremos que automaticamente descontarlo de su cuenta<br> ';
                                if(mysqli_query($connect,$sql2)){
                                        if(mysqli_query($connect,$sql3)){
                                        } else {
                                                echo "Error: " . $sql2 . "<br>" . mysqli_error($connect);
                                                }
                                } else {
                                        echo "Error: " . $sql3 . "<br>" . mysqli_error($connect);
                                        }
                        }
                        else if(mysqli_query($connect,$sql)){
                        } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                        }
                }
        }
        echo 'este mes usted tiene que pagar esta cantidad : ' . $row2[8];
 ?>
<br>
 <a href="Pay.php?id=<?php echo $row2[5]?>">pagar</a><br> 

 <br><br><br>
<?php
}


?>


<br>
<a href="Logout.php" class="">Cerrar Sesion</a>
