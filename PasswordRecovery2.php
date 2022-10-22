<?php
include("ConnectDB.php");
// codigo para enviar al correo del usuario su password, ojo no la puede cambiar solo recordarla(funciona solo en hosting)
$EMAIL= $_POST['txtcorreo'];

$consult = "SELECT *
            FROM users
            WHERE email ='$EMAIL'";
$result = mysqli_query($connect,$consult);

if($result){
    while($row = $result->fetch_array()){
        $USER = $row['names'];
        $PASSWORD = $row['password'];
    }
}

$subject  = "Recuperar password";
$msg      = "hola" . $USER . "no olvidas la cabeza, por que la traes pegada, aqui tu password <br>" . $PASSWORD;
$header.= "From: noreplay@example.com" . "\r\n";
$header.= "Reply-to: noreplay@example.com" . "\r\n";
$header = "X-Mailer: PHP/" . phpversion();
$mail = @mail($correo,$asunto,$msg,$header);

if($mail){
    echo"<h4>Mail enviado exitosamente<h4>";
    }else{
        echo "lo siento bro algo hiciste mal";
}

?>