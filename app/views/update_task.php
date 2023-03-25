<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Editar tarea</h1>
<form action="update_task.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
    
    <label for="description">Descripción:</label>
    <input type="text" name="description" value="<?php echo $task->getDescription(); ?>" required>

    <label for="status">Estado:</label>
    <select name="status" required>
        <option value="pendiente" <?php if ($task->getStatus() == "pendiente") echo "selected"; ?>>Pendiente</option>
        <option value="en_ejecucion" <?php if ($task->getStatus() == "en_ejecucion") echo "selected"; ?>>En ejecución</option>
        <option value="terminada" <?php if ($task->getStatus() == "terminada") echo "selected"; ?>>Terminada</option>
    </select>

    <label for="start_time">Hora de inicio:</label>
    <input type="datetime-local" name="start_time" value="<?php echo date('Y-m-d\TH:i', strtotime($task->getStartTime())); ?>" required>

    <label for="end_time">Hora de fin:</label>
    <input type="datetime-local" name="end_time" value="<?php echo date('Y-m-d\TH:i', strtotime($task->getEndTime())); ?>">

    <label for="created_by">Creada por:</label>
    <input type="text" name="created_by" value="<?php echo $task->getCreatedBy(); ?>" required>

    <button type="submit">

</body>
</html>