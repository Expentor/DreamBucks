<?php
include("ConnectDB.php");

// declarsmoa variables con los datos provenientes de login A utilizando el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$TOTAL =$_POST["quantity"];
// limpiamos codigo para evitar inyecciones
$passwordHash = password_hash($PASSWORD, PASSWORD_BCRYPT); 

$consult = "SELECT * FROM users WHERE name_U='$NAME'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<?php   
        $id_U = $row[0]; //guardamos su id en una variable
        $balance = $row[9];
?><br><br>
<?php
}

//obtenemos fecha actual
$DATE = date('Y-m-d');

// el saldo actual mas el nuevo
$NewBalance = $balance + $TOTAL;

// verificamos que el nombre del usuario existe al igual que su contraseña
$consult_U = "SELECT name_U
            FROM users
            WHERE name_U= '$NAME' and password_U='$PASSWORD'";
$consult_U = mysqli_query($connect, $consult_U); 
$consult_U = mysqli_fetch_array($consult_U);


        if($consult_U){
        // insertamos en la base de datos la informacion, los espacios en blanco son datos que aun no se tienen
            if(!$consultE){
            $sql = "INSERT INTO movements VALUES ('$DATE', '$id_U', '','$TOTAL', 'recharge')";
            $sql2 = "UPDATE users
                    SET    balance = '$NewBalance'
                    WHERE  id_U  = '$id_U'";    
            }else {
            echo "<script>
            alert('error');
            window.location = 'Credit_Rechargue.php';
            </script>";
            }            
                if(mysqli_query($connect,$sql)){
                    header("location: user.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                } 
                if(mysqli_query($connect,$sql2)){
                    header("location: user.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                } 
        } else {
            echo "<script>
            alert('usuario existente');
            window.location = 'CreateLoan.php';
            </script>";
        }


mysqli_close($connect);
?>