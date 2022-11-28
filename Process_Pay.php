<?php
// codigo para procesar el pago
session_start();
$user= $_SESSION["name_U"]; // nombre del usuario
$id = $_GET['id']; // el id del prestamo

$connect = mysqli_connect("localhost", "root", "", "dreambucks");

// el dinero que el usuario utiliza para pagar se guarda en esta variable
$deposit =$_POST["pay"];


mysqli_set_charset($connect, "utf8");            

// consulta para encontrar el prestamo que se pagara
$consult = "SELECT * FROM loans WHERE id_L='$id'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<?php 
    $total= $row[5];// guardamos en una variable lo que le falta por pagar al usuario 
    $id_U1 = $row[1]; //guardamos el id del usuario
    $due = $row[8]; //lo que el usuario debe pagar este mes
?>
<?php
}

// consulta para obtener datos del usuario
$consult = "SELECT * FROM users WHERE name_U='$user'"; 
$result  = mysqli_query($connect, $consult);
while ($row2 = mysqli_fetch_row($result)){
?>
<?php 
    $balance = $row2[10]; 
?>
<?php
}
// aqui sumamos todos los prestamos del usuario(tanto los abonados como los nuevos) para sacar un total y mostrarselo en la pagina de user.php
$consult = "SELECT SUM(total) as result FROM loans WHERE id_U1 = '$id_U1'";
$result = mysqli_query($connect, $consult);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

// LAS VARIABLES PARA ACTUALIZAR BASE DE DATOS
$debited = $row["result"]; //guardamos en la variable la suma total
$Newtotal = $total - $deposit;
$Newdue = $due- $deposit;
$Newbalance = $balance - $deposit;


// actualizamos (cuanto le queda por pagar al usuario del total)
$update_total = "UPDATE loans
        SET    total = '$Newtotal'
        WHERE  id_L  = '$id'";

// actualizamos (cuanto le queda por pagar al usuario por este mes)
$update_due = "UPDATE loans
         SET     due = '$Newdue'
         WHERE  id_L  = '$id'";

// actualizamos (cuanto le queda de saldo al usuario despues del pago)
$update_balance = "UPDATE users
         SET    balance = '$Newbalance'
         WHERE  id_U  = '$id_U1'";

//actualizamos la nueva info(la suma total de los pretamos pero actualizada despuesde la operacion)
$update_debited = "UPDATE users
        SET    debited = '$debited'
        WHERE  name_U='$user'";

if($deposit < $total && $deposit <= $due){
    if($balance > $deposit){

        if(mysqli_query($connect,$update_total)){
        } else {
                echo "Error: " . $update_total . "<br>" . mysqli_error($connect);
            }   

        if($due>0){       
            if(mysqli_query($connect,$update_due)){
            } else {
                echo "Error: " . $update_due . "<br>" . mysqli_error($connect);
                    }
        } 

        if(mysqli_query($connect,$update_balance)){
            header("location: user.php");
        } else {
            echo "Error: " . $update_balance . "<br>" . mysqli_error($connect);
            }

        if(mysqli_query($connect,$update_debited)){
        header("location: user.php");
        } else {
            echo "Error: " . $update_debited . "<br>" . mysqli_error($connect);
        }                 
    }else{
        echo "<script>
        alert('Ingresaste un cantidad de dinero que no tienes, por favor vuelve a intentarlo');
        window.location =Pay.php;
        </script>";
    }
}else{
    echo "<script>
    alert('Ingresaste un cantidad mayor a la cuota que debes este mes, verifica  y vuelve a intentarlo');
    window.location =Pay.php;
    </script>";
}    

?>