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


for($i=0; $i<=$lapses;$i++ ){


    echo "<br> periodo: "  . $i . "<br>";
    echo "cuota: "    . round($quota1) . "<br>";
    echo "intereses: "  . round($intereses). "<br>";
    echo "abono: "    . round($abono) . "<br>";
    echo "saldo: "    . round($quantify) . "<br><br>";
    $intereses = $quantify * $inte;
    $abono = $quota - $intereses;
    $quantify = $quantify - $abono;
    $quota1 = $quota;
}
?>
