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

//$plantilla = $lapses;
for($i=0; $i<=$lapses;$i++ ){

    $plantilla .= '<br> periodo: ' . $i . 
                  '<br> cuota  : ' . round($quota1) .
                  '<br> interes: ' . round($intereses). 
                  '<br> abono  : ' . round($abono) . 
                  '<br> saldo  : ' . round($quantify) . '<br>';
                  
    $intereses = $quantify * $inte;
    $abono = $quota - $intereses;
    $quantify = $quantify - $abono;
    $quota1 = $quota;
}


return $plantilla;
}
?>