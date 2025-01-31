<?php
require_once 'Conexiontwo.php';

class Tarea {
    private $id;
    private $nombre;
    private $estado;
    private static $con;

    public function __construct($id, $nombre, $estado, $con) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estado = $estado;
        self::$con = $con;
    }

    public static function obtenerTareas() {
        $tasks = [];
        // Usamos self::$con porque es una propiedad estática
        $stmt = self::$con->prepare("SELECT * FROM tareas WHERE Estado = 1");

        // Intentamos ejecutar la consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Obtenemos todos los resultados y creamos objetos Tarea
            // while ($row = $result->fetch_assoc()) {
            //     // Crear una instancia de Tarea para cada fila de datos
            //     $tareas[] = new Tarea($row['Id'], $row['Nombre'], $row['Estado'], self::$con);
            // }

            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }

        }
        echo $tasks;
        return $tasks; // Ahora $tareas es un array de objetos Tarea
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEstado() {
        return $this->estado;
    }
}
?>
