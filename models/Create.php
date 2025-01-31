<?php
include("../config/conexion.php");


// if (!$conexion) {
//     die("Error de conexión: " . mysqli_connect_error());
// }

// $query = "INSERT INTO tareas (titulo, completada) VALUES ('sdsdds', 0)";
// $resultado = mysqli_query($conexion, $query);

// if ($resultado) {
//     echo "Algo fue bien";
// } else {
//     echo "Error en la consulta: " . mysqli_error($conexion);
// }


// mysqli_close($conexion);


class Task {
    private $task;

    public function __construct($task) {
        $this->task = $task;
    }

    public function getTask() {
        return $this->task;
    }

    public function save() {
        // Aquí puedes implementar la lógica para guardar la tarea en una BD o archivo
        return "Tarea guardada: " . htmlspecialchars($this->task);
    }
}




?>
