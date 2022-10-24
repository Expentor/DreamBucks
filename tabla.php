
<?php
$p = 3000000; 
$n = 4;
$inte = .015;
$b = 1 + $inte;
$quota = $p * ((pow($b,$n) * $inte) / (pow($b,$n)-1)); //formula para conseguir la cuota de pago mensual
$total = $quota * $n;
$intereses = 0;
$abono = 0;
echo $quota;

for($i=0; $i<=$n;$i++ ){

    echo "<br> periodo: "  . $i . "<br>";
    echo "cuota: "    . round($quota) . "<br>";
    echo "intereses: "  . round($intereses). "<br>";
    echo "abono: "    . round($abono) . "<br>";
    echo "saldo: "    . round($p) . "<br><br>";
    $intereses = $p * $inte;
    $abono = $quota - $intereses;
    $p = $p - $abono;
}
?>