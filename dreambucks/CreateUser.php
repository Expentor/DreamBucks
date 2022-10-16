<?php
include("ConnectDB.php");
session_start();
//utilizamos la variable global SESSION para recurrir al id del admi 
$ADMIN = $_SESSION["id_A"]; 

// declarsmoa variables con los datos provenientes de login A con el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$EMAIL =$_POST["email"];
$ADDRESS =$_POST["address"];
$PHONE =$_POST["phone"];

// limpiamos codigo para evitar inyecciones
$passwordHash = password_hash($PASSWORD, PASSWORD_BCRYPT); 

// verificamos que el nombre del usuario no existe
$consultId = "SELECT name_U
            FROM users
            WHERE name_U= '$NAME' ";
$consultId = mysqli_query($connect, $consultId); 
$consultId = mysqli_fetch_array($consultId); 

if(!$consultId){
    // verificamos que el email del usuario no exista
    $consultE = "SELECT name_U 
                FROM users
                WHERE email_U = '$EMAIL'";
    $consultE = mysqli_query($connect, $consultE);
    $consultE = mysqli_fetch_array($consultE);


    // insertamos en la base de datos la informacion, los espacios en blanco son datos que aun no se tienen
    if(!$consultE){
    $sql = "INSERT INTO users VALUES ('', '$NAME', '$PASSWORD', '$EMAIL','','$ADDRESS', '$PHONE', '$ADMIN', '')";    
    }else {
    echo "<script>
    alert('email existente');
    window.location = 'Register_U.php';
    </script>";
    }
    
    if(mysqli_query($connect,$sql)){
        header("location: Login_U.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    } 
    
} else {
    echo "<script>
    alert('usuario existente');
    window.location = 'Register_U.php';
    </script>";
}
  

mysqli_close($connect);
?>