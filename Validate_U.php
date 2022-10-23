<<<<<<< HEAD
<?php
include('ConnectDB.php');
// aqui validamos al usuario cliente
$NAME= test_input($_POST['name']);
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
           FROM users 
           WHERE name_U='$NAME' and password_U='$PASSWORD' ";
$result = mysqli_query($connect, $consult);

$rows= mysqli_num_rows($result);
if($rows){
    session_start();
    $_SESSION["name_U"] = $_POST["name"];
    header("location:trueData.html"); 

}else{
    echo "<script>
        alert('Usuario o Password incorrecto');
        window.location =Fakedata.html;
    </script>";

}

mysqli_free_result($result);
mysqli_close($connect);

=======
<?php
include('ConnectDB.php');
// aqui validamos al usuario cliente
$NAME= test_input($_POST['name']);
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
           FROM users 
           WHERE name_U='$NAME' and password_U='$PASSWORD' ";
$result = mysqli_query($connect, $consult);

$rows= mysqli_num_rows($result);
if($rows){
    session_start();
    $_SESSION["name_U"] = $_POST["name"];
    header("location:trueData.html"); 

}else{
    echo "<script>
        alert('Usuario o Password incorrecto');
        window.location =Fakedata.html;
    </script>";

}

mysqli_free_result($result);
mysqli_close($connect);

>>>>>>> 489a8dd2e8326661ba09819801aaab03f573da98
?>