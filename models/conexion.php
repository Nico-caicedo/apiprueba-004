<?php


// $conexion = mysqli_connect("172.168.0.40", "root", "Sys2020*", "apiprueba");


$conexion = mysqli_connect("localhost", "root", "", "tareas");

if (!$conexion) {
  die("algo salio mal" . mysqli_connect_error());
}

if (!$conexion->set_charset("utf8mb4")) {
  die("Error al establecer el conjunto de caracteres utf8mb4: " . $conexion->error);
}


?>