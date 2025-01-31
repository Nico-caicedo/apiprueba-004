<?php
require_once '../models/Task.php';
require_once '../models/conexion.php';  // Asegúrate de incluir la conexión

class TaskController
{
    public function saveTask($task)
    {
        global $conexion; // Usamos la conexión global definida en db.php
        $taskObj = new Task($task, $conexion);  // Pasamos la conexión a la clase
        return $taskObj->save();
    }

    public function FinishTask($id){
        global $conexion;
        $taskObj = new Task("", $conexion);  // Pasamos la conexión, pero no usamos $task
        return $taskObj->FinishTask($id);
    }

    public function deleteTask($id)
    {
        global $conexion;
        $taskObj = new Task("", $conexion);  // Pasamos la conexión, pero no usamos $task
        return $taskObj->delete($id);
    }

    public function getTasks() {
        global $conexion; 
        
  
        $taskObj = new Task(null, $conexion);
        $taskObj->getTaskdb();  
    }

}

// Manejo de la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['TextTask'])) {
    $controller = new TaskController();
    $response = $controller->saveTask($_POST['TextTask']); // Pasa el texto de la tarea
    echo $response;
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Delete_Id'])) {
    $controller = new TaskController();
    $response = $controller->deleteTask($_POST['Delete_Id']);
    echo $response;
} else  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $controller = new TaskController();
    $controller->getTasks();  // Llamamos a la función que obtiene las tareas
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Finish_Id'])) {
    $controller = new TaskController();
    $response = $controller->FinishTask($_POST['Finish_Id']);
    echo $response;
} else {
    echo "Método no permitido";
}


