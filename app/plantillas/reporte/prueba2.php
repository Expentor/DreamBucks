<?php


function getPlantilla($info){


foreach($info as $in){
    $quantify =  $in["quantify"];
    $lapses  =  $in["lapses"];
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

//$plantilla = $lapses;
for($i=0; $i<=$lapses;$i++ ){

    $plantilla .= 
    '<tr>'.
    '<td> periodo: ' . $i .                     '</td>'.
    '<td> cuota  : ' . round($quota1) .         '</td>'.
    '<td> interes: ' . round($intereses).       '</td>'.
    '<td> abono  : ' . round($abono) .          '</td>'.
    '<td> saldo  : ' . round($quantify) .       '</td>';

    $intereses = $quantify * $inte;
    $abono = $quota - $intereses;
    $quantify = $quantify - $abono;
    $quota1 = $quota;
?>
     </tr>
<?php 


return $plantilla;
}

}
?>  </table> <br><br><br> 