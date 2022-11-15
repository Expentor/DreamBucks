<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleAmortizationTable.css">
    <!--        -->
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
                </ul>
                <ul>
                    <li><a href="user.php">Volver a mis prestamos</a></li>
                </ul>
            </nav>
        </div>
        </header>
</body>
</html>
<?php
include("ConnectDB.php");
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
    <thead>
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
        <td>    <?php echo round($quantify)   ?>     </td>


<?php 
    $intereses = $quantify * $inte;
    $abono = $quota - $intereses;
    $quantify = $quantify - $abono;
    $quota1 = $quota;
?>
     </tr>
     <?php 


}
?>  </table> <br><br><br> 
