
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Tareas</title>
    <link rel="stylesheet" href="assets/style/index.css">
    <script src="assets/scripts/index.js"></script>
</head>

<body>
    <h1>Dashboard de Tareas</h1>

    <form method="post" action="" id="CreateTask">
        <input type="text" name="text" id="TextTask" placeholder="Escribir tarea" >
        <input type="submit" onclick="CreateTask()" name="crear" value="Crear">
    </form>

    <div>
        <h3>Tareas creadas</h3>
        <div id="container_tareas">
           <div class="tarea">
                <div>Nombre</div>
                <div>
                    <p>Estado</p>
                    <p>Terminada</p>
                </div>
                <div><p>acciones</p>
                <div id="">
                    <p onclick="finishTask">Terminar</p>
                    <p onclick="DeleteTask">eliminar</p>
                </div>
                </div>
           </div>
        </div>
    </div>

</body>

</html>

