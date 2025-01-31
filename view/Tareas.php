<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Tarea</th>
                <th>Estado Tarea</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= htmlspecialchars($tarea['Nombre']); ?></td>
                    <td><?= htmlspecialchars($tarea['Estado']); ?></td>
                    <td>
                        <a href="editar.php?id=<?= $tarea['Id']; ?>">Editar</a> |
                        <a href="borrar.php?id=<?= $tarea['Id']; ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
