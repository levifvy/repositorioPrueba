<?php require_once "partials/header.php" ?>

<h1>Editar tarea</h1>

<form method="post">
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="<?= $task->name ?>" required>
    <br>
    <label for="description">Descripción:</label>
    <textarea name="description" required><?= $task->description ?></textarea>
    <br>
    <label for="status">Estado:</label>
    <select name="status" required>
        <option value="Pendiente"<?= $task->status == "Pendiente" ? " selected" : "" ?>>Pendiente</option>
        <option value="En ejecución"<?= $task->status == "En ejecución" ? " selected" : "" ?>>En ejecución</option>
        <option value="Terminada"<?= $task->status == "Terminada" ? " selected" : "" ?>>Terminada</option>
    </select>
    <br>
    <label for="start_time">Hora de inicio:</label>
    <input type="datetime-local" name="start_time" value="<?= date("Y-m-d\TH:i:s", strtotime($task->start_time)) ?>" required>
    <br>
    <label for="end_time">Hora de fin:</label>
    <input type="datetime-local" name="end_time" value="<?= date("Y-m-d\TH:i:s", strtotime($task->end_time)) ?>" required>
    <br>
    <label for="user">Usuario:</label>
    <input type="text" name="user" value="<?= $task->user ?>" required>
    <br>
    <input type="submit" value="Guardar cambios">
</form>

<a href="index.php">Volver al listado de tareas</a>

<?php require_once "partials/footer.php" ?>
