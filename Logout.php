<?php
// cerrar sesion
session_start(); 
session_destroy();
header('Location:index.php'); //duda
  
?>