<<<<<<< HEAD
<?php
include("ConnectDB.php");

// declarsmoa variables con los datos provenientes de login A utilizando el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$QUANTIFY =$_POST["quantity"];
$LAPSES =$_POST["lapses"];

// limpiamos codigo para evitar inyecciones
$passwordHash = password_hash($PASSWORD, PASSWORD_BCRYPT); 

//TABLA DE AMORTIZACION 
$interest = .03;
$w = 1+$interest; //pa ahorrar codigo es parte de la formula
$quota = $QUANTIFY * ((pow($w,$LAPSES) * $interest) / (pow($w,$LAPSES)-1)); //formula para conseguir la cuota de pago mensual
$total = $quota * $LAPSES;

// accedemos a la tabla usuarios para obtener el adeudado total de nuestro usuario 
$consult = "SELECT * FROM users WHERE name_U='$NAME'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<?php   
        $due = $row[4]; //lo que debe el usuario
        $id_U = $row[0]; //guardamos su id en una variable
?><br><br>
<?php
}
// sumamos la cantidad del prestamo que solicita el usuario mas el adeudado que tiene de prestamos anteriores y lo guardamo en total
$totalDebt = $QUANTIFY + $due;
//obtenemos fecha actual
$DATE = date('Y-m-d');
// verificamos que el nombre del usuario existe al igual que su contraseña
$consult_U = "SELECT name_U
            FROM users
            WHERE name_U= '$NAME' and password_U='$PASSWORD'";
$consult_U = mysqli_query($connect, $consult_U); 
$consult_U = mysqli_fetch_array($consult_U);

if($totalDebt>=100000){
    echo "<script>
    alert('este usuario excedio limite');
    window.location = 'admin.php';
    </script>";
}else{
        if($consult_U){
        // insertamos en la base de datos la informacion, los espacios en blanco son datos que aun no se tienen
        if(!$consultE){
        $sql = "INSERT INTO loans (date, id_U1, quantity, interest, total,lapses,quota,due) VALUES ('$DATE', '$id_U', '$QUANTIFY','3','$total', '$LAPSES','$quota', '$quota')";    
        }else {
        echo "<script>
        alert('error');
        window.location = 'CreateLoan.php';
        </script>";
        }
        if(mysqli_query($connect,$sql)){
            header("location: admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        } 
        
        } else {
            echo "<script>
            alert('usuario o contraseña erronea');
            window.location = 'CreateLoan.php';
            </script>";
        }
}


// aqui sumamos todos los prestamos del usuario(tanto los abonados como los nuevos) para sacar un total y mostrarselo en la pagina de user.php
$consult = "SELECT SUM(total) as result FROM loans WHERE id_U1 = '$id_U'";
$result = mysqli_query($connect, $consult);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$debited = $row["result"]; //guardamos en la variable la suma total

//actualizamos la nueva info(la suma total de los pretamos pero actualizada despuesde la operacion)
$update_debited = "UPDATE users
        SET    debited = '$debited'
        WHERE  name_U='$NAME'";
if(mysqli_query($connect,$update_debited)){
} else {
    echo "Error: " . $update_debited . "<br>" . mysqli_error($connect);
} 
mysqli_close($connect);
=======
<?php
include("ConnectDB.php");

// declarsmoa variables con los datos provenientes de login A utilizando el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$QUANTIFY =$_POST["quantity"];
$LAPSES =$_POST["lapses"];

// limpiamos codigo para evitar inyecciones
$passwordHash = password_hash($PASSWORD, PASSWORD_BCRYPT); 

//TABLA DE AMORTIZACION 
$interest = .03;
$w = 1+$interest; //pa ahorrar codigo es parte de la formula
$quota = $QUANTIFY * ((pow($w,$LAPSES) * $interest) / (pow($w,$LAPSES)-1)); //formula para conseguir la cuota de pago mensual
$total = $quota * $LAPSES;

// accedemos a la tabla usuarios para obtener el adeudado total de nuestro usuario 
$consult = "SELECT * FROM users WHERE name_U='$NAME'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<?php   
        $due = $row[4]; //lo que debe el usuario
        $id_U = $row[0]; //guardamos su id en una variable
?><br><br>
<?php
}
// sumamos la cantidad del prestamo que solicita el usuario mas el adeudado que tiene de prestamos anteriores y lo guardamo en total
$totalDebt = $QUANTIFY + $due;
//obtenemos fecha actual
$DATE = date('Y-m-d');
// verificamos que el nombre del usuario existe al igual que su contraseña
$consult_U = "SELECT name_U
            FROM users
            WHERE name_U= '$NAME' and password_U='$PASSWORD'";
$consult_U = mysqli_query($connect, $consult_U); 
$consult_U = mysqli_fetch_array($consult_U);

if($totalDebt>=100000){
    echo "<script>
    alert('este usuario excedio limite');
    window.location = 'admin.php';
    </script>";
}else{
        if($consult_U){
        // insertamos en la base de datos la informacion, los espacios en blanco son datos que aun no se tienen
        if(!$consultE){
        $sql = "INSERT INTO loans (date, id_U1, quantity, interest, total,lapses,quota,due,months) VALUES ('$DATE', '$id_U', '$QUANTIFY','3','$total', '$LAPSES','$quota', '$quota', '0')";    
        }else {
        echo "<script>
        alert('error');
        window.location = 'CreateLoan.php';
        </script>";
        }
        if(mysqli_query($connect,$sql)){
            header("location: admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        } 
        
        } else {
            echo "<script>
            alert('usuario o contraseña erronea');
            window.location = 'CreateLoan.php';
            </script>";
        }
}


// aqui sumamos todos los prestamos del usuario(tanto los abonados como los nuevos) para sacar un total y mostrarselo en la pagina de user.php
$consult = "SELECT SUM(total) as result FROM loans WHERE id_U1 = '$id_U'";
$result = mysqli_query($connect, $consult);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$debited = $row["result"]; //guardamos en la variable la suma total

//actualizamos la nueva info(la suma total de los pretamos pero actualizada despuesde la operacion)
$update_debited = "UPDATE users
        SET    debited = '$debited'
        WHERE  name_U='$NAME'";
if(mysqli_query($connect,$update_debited)){
} else {
    echo "Error: " . $update_debited . "<br>" . mysqli_error($connect);
} 
mysqli_close($connect);
>>>>>>> 489a8dd2e8326661ba09819801aaab03f573da98
?>