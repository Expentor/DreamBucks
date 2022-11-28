<?php
$connect = mysqli_connect("localhost", "root", "M33ty-2003", "dreambucks");
session_start();
//utilizamos la variable global SESSION para recurrir al id del admi 
$ADMIN = $_SESSION["id_A"]; 

// declarsmoa variables con los datos provenientes de login A con el metodo post
$NAME =$_POST["name"];
$PASSWORD =$_POST["password"];
$EMAIL =$_POST["email"];
$ADDRESS =$_POST["address"];
$PHONE =$_POST["phone"];
$LASTNAME1 =$_POST["lastname1_U"];
$LASTNAME2 =$_POST["lastname2_U"];
$DEBITED= 0;
$BALANCE=0;

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
    $sql = "INSERT INTO users (name_U, lastname1_U, lastname2_U, password_U, email_U, debited, address_U, phone, id_A1, balance) VALUES ('$NAME', '$LASTNAME1', '$LASTNAME2', '$PASSWORD', '$EMAIL','0', '$ADDRESS', '$PHONE','$ADMIN','0')";    
    }else {
    echo "<script>
    alert('email existente');
    window.location = 'Register_U.php';
    </script>";
    }
    
    if(mysqli_query($connect,$sql)){
        header("location: creationUserConfirm.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    } 
    
} else {
    echo "<script>
    alert('usuario existente')
    window.location = 'Register_U.php';
    </script>";
}
  

mysqli_close($connect);
?>