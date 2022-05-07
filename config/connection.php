<?php
$host="163.178.107.10";
$bd="tarea_optativa";
$user="laboratorios";
$pass="KmZpo.2796";

try {
  $connection= mysqli_connect($host, $user, $pass, $bd);
  // if($connection){ 
  //    echo("Conectado a la base");
  //  }

  
} catch (Exception $ex) {
  echo $ex->getMessage();
}
?>