<?php
include("ConnectDB.php");

// declarsmoa variables con los datos provenientes de login A utilizando el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$QUANTIFY =$_POST["quantity"];

// limpiamos codigo para evitar inyecciones
$passwordHash = password_hash($PASSWORD, PASSWORD_BCRYPT); 

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
$total = $QUANTIFY + $due;
// obtenemos el interes del prestamo multiplcandolo por una cantidad un x 
$interest = $QUANTIFY * .05;
//obtenemos fecha actual
$DATE = date('Y-m-d');

// verificamos que el nombre del usuario existe al igual que su contraseña
$consult_U = "SELECT name_U
            FROM users
            WHERE name_U= '$NAME' and password_U='$PASSWORD'";
$consult_U = mysqli_query($connect, $consult_U); 
$consult_U = mysqli_fetch_array($consult_U);

if($total>=50000){
    echo "<script>
    alert('este usuario excedio limite');
    window.location = 'admin.php';
    </script>";
}else{
        if($consult_U){
        // insertamos en la base de datos la informacion, los espacios en blanco son datos que aun no se tienen
        if(!$consultE){
        $sql = "INSERT INTO loans VALUES ('$DATE', '$id_U', '$QUANTIFY','$interest','$total', '')";    
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
            alert('usuario existente');
            window.location = 'CreateLoan.php';
            </script>";
        }
}

mysqli_close($connect);
?>