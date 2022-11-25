<?php
$connect = mysqli_connect("localhost", "root", "MS2002hector", "dreambucks5");
// aqui se valida al admi que quiera hacer login
$ID= test_input($_POST['id']);
$PASSWORD= test_input($_POST['password']);

// una funcion para limpiar y evitar inyecciones 
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// validar id y password
$consult="SELECT*
           FROM admins 
           WHERE id_A='$ID' and password_A='$PASSWORD' ";
$result = mysqli_query($connect, $consult);

$rows= mysqli_num_rows($result);
if($rows){
    session_start();
    $_SESSION["id_A"] = $_POST["id"];
    
    header("location:trueDataA.html"); 

}else{
    echo "<script>
        alert('Usuario o Password incorrecto');
        window.location =Login_A.php;
    </script>";

    header("location:fakeDataA.html"); 

}

mysqli_free_result($result);
mysqli_close($connect);

?>