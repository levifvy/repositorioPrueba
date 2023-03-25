<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Hora de inicio</th>
            <th>Hora de fin</th>
            <th>Creado por</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($$tasks as $task): ?>
        <tr>
            <td><?= $task->getId() ?></td>
            <td><?= $task->getDescription() ?></td>
            <td><?= $task->getStatus() ?></td>
            <td><?= $task->getStartTime() ?></td>
            <td><?= $task->getEndTime() ?></td>
            <td><?= $task->getCreatedBy() ?></td>
            <td>
                <form action="update_status.php" method="POST">
                    <input type="hidden" name="id" value="<?= $task->getId() ?>">
                    <select name="status" onchange="this.form.submit()">
                        <option value="pendiente" <?= ($task->getStatus() == "pendiente") ? "selected" : "" ?>>Pendiente</option>
                        <option value="en_ejecucion" <?= ($task->getStatus() == "en_ejecucion") ? "selected" : "" ?>>En ejecución</option>
                        <option value="terminada" <?= ($task->getStatus() == "terminada") ? "selected" : "" ?>>Terminada</option>
                    </select>
                </form>
                <form action="delete_task.php" method="POST">
                    <input type="hidden" name="id" value="<?= $task->getId() ?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>