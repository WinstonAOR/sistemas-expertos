<?php
$host="163.178.107.10";
$bd="ampliacion_sistemas_expertos";
$user="laboratorios";
$pass="Uy&)&nfC7QqQau.%278UQ24/=%";

try {
  $connection= mysqli_connect($host, $user, $pass, $bd);
  // if($connection){ 
  //    echo("Conectado a la base");
  //  }

  
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>