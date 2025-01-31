<?php


class Task
{
    private $task;
    private $conexion; // Usamos el nombre correcto de la propiedad

    // Asegúrate de pasar la conexión correctamente al crear la clase
    public function __construct($task, $conexion)
    {
        $this->task = $task;
        $this->conexion = $conexion; // Asignamos correctamente la conexión
    }


    public function getTaskdb()
    {
        // Preparamos la consulta
        $stmt = $this->conexion->prepare("SELECT * FROM Tareas where Estado = 1");

        // Intentamos ejecutar la consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $tasks = [];

            // Obtenemos todos los resultados
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }

            // Retornamos los resultados como JSON
            header('Content-Type: application/json');
            echo json_encode($tasks);
        } else {
            // En caso de error, retornamos el error como JSON
            header('Content-Type: application/json');
            echo json_encode(["error" => "Error al obtener las tareas."]);
        }
    }


    public function Delete($id)
    {
        // Ejemplo de cómo podrías implementar el método de eliminar
        $stmt = $this->conexion->prepare("UPDATE tareas SET Estado = 0 WHERE Id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return "Tarea eliminada correctamente.";
        } else {
            return "Error al eliminar la tarea.";
        }
    }


    public  function FinishTask($id) {
        $stmt = $this->conexion->prepare("UPDATE tareas SET Completada = 1 WHERE Id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return "Tarea eliminada correctamente.";
        } else {
            return "Error al eliminar la tarea.";
        }
    }

    public function save()
    {
        // Aquí preparamos la consulta de inserción
        $stmt = $this->conexion->prepare("INSERT INTO tareas (Nombre, Completada, Estado) VALUES (?, 0, 1)");
        $stmt->bind_param("s", $this->task);  // Vinculamos el parámetro de tarea como tipo 'string'

        if ($stmt->execute()) {
            return "Tarea guardada: " . htmlspecialchars($this->task);
        } else {
            return "Algo falló al guardar la tarea.";
        }
    }



}

