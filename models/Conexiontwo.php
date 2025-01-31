<?php


// $conexion = mysqli_connect("172.168.0.40", "root", "Sys2020*", "apiprueba");


$con = mysqli_connect("localhost", "root", "", "tareas");

if (!$con) {
  die("algo salio mal" . mysqli_connect_error());
}

if (!$con->set_charset("utf8mb4")) {
  die("Error al establecer el conjunto de caracteres utf8mb4: " . $con->error);
}


?>