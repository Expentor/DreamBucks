<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<?php
$user = $_SESSION["name_U"];
?>

        <header>        
                <div>
                    <ul>
                        <li><a href="index.php" class="">Inicio</a></li>
                        <li><a href="Profile.php"  class=""> <?php echo $user ?> </a></li> 
                        <li><a href="Logout.php" class="">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </header>   
</form> 
</body>     
</html>
  

