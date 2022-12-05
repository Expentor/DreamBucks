<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleAmortizationTable.css">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
    crossorigin="anonymous">
            -->
        <link rel="stylesheet" href="./styles/styleHeaderUL.css">
    <title>Tabla de amortización</title>
</head>
<body>
        <!--            -->
        <header class="header">
        <div class="container-head logo-nav-container">
            <a class="logo">DREAMBUCKS</a>
            <div class="menu-icon">Regresar</div>
            <nav class="navigation">
                <ul>
                    <li><a href="Logout.php">Cerrar Sesion</a></li>
                    <li><a href="user.php">Volver a mis prestamos</a></li>
                    <button class="pay" onclick="location.href='/app/prueba.php?id=<?php echo $_POST['id']?>'">Mostrar pdf</a><br> 

                </ul>
            </nav>
        </div>
        </header>
</body>
</html>
<?php
$connect = mysqli_connect("localhost", "root", "M33ty-2003", "dreambucks");
$id = $_GET['id']; // el id del prestamo

$consult = "SELECT * FROM loans WHERE id_L='$id'"; 
$result  = mysqli_query($connect, $consult);
while ($row = mysqli_fetch_row($result)){
?>
<?php   
    $quantify =  $row[3];
    $lapses  =  $row[6];
?>
<?php
}


$inte = .015;
$b = 1 + $inte;
$quota = $quantify * ((pow($b,$lapses) * $inte) / (pow($b,$lapses)-1)); //formula para conseguir la cuota de pago mensual
$total = $quota *$lapses;
$intereses = 0;
$abono = 0;
$quota1 = 0;


?>
<table class="amortization">
    <thead class="info">
        <th>Periodo</th>
        <th>Cuota</th>
        <th>Intereses</th>
        <th>Abono</th>
        <th>Saldo</th>
    </thead>
<?php 

for($i=0; $i<=$lapses;$i++ ){

?>

     <tr>
        <td>    <?php echo      $i            ?>     </td>
        <td>    <?php echo round($quota1)     ?>     </td>
        <td>    <?php echo round($intereses)  ?>     </td>
        <td>    <?php echo round($abono)      ?>     </td>           
        <td>    <?php echo round($quantify) +0?>     </td>
    </tr>
<?php 
    $intereses = $quantify * $inte;
    $abono = $quota - $intereses;
    $quantify = $quantify - $abono;
    $quota1 = $quota;
?>
<?php 
}
?> </table> <br><br><br> 

