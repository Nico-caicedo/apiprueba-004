<?php
require_once '../models/TaskM.php';

class TareaController {

    public function index() {
        // Obtener todas las tareas
        $tareas = Tarea::obtenerTareas();

        // Asegurarnos de que las tareas no están vacías antes de incluir la vista
        if (empty($tareas)) {
            $tareas = [];  // Aseguramos que no sea NULL
        }

        // Pasar las tareas a la vista de forma explícita
        require_once '../views/Tareas.php';  // Aquí no es necesario usar 'extract()' porque pasamos directamente la variable
    }
}
?>
