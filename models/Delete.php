<?php
include("../config/conexion.php");
try {
    $ID  = $_GET['id'];
    // Verificar si la conexión es válida
    if (!$conexion) {
        die("Error de conexión: "  . mysqli_connect_error());
    }

    // Consulta para insertar datos en la tabla 'tareas'
    $query = "DELETE FROM  tareas WHERE id = $ID";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si la consulta se ejecutó correctamente
    if ($resultado) {
        echo "Algo fue bien";
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} catch (Exception $err) {
    print_r($err->getMessage());
}