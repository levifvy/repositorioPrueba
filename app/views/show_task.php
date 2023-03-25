<?php require_once "partials/header.php" ?>

<h1>Tarea</h1>

<table>
    <tr>
        <th>Nombre</th>
        <td><?= $task->name ?></td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td><?= $task->description ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= $task->status ?></td>
    </tr>
    <tr>
        <th>Hora de inicio</th>
        <td><?= date("d/m/Y H:i", strtotime($task->start_time)) ?></td>
    </tr>
    <tr>
        <th>Hora de fin</th>
        <td><?= date("d/m/Y H:i", strtotime($task->end_time)) ?></td>
    </tr>
    <tr>
        <th>Usuario</th>
        <td><?= $task->user ?></td>
    </tr>
</table>

<a href="index.php">Volver al listado de tareas</a>

<?php require_once "partials/footer.php" ?>
