<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Crear nueva tarea</h1>
<form action="create_task.php" method="POST">
    <label for="description">Descripción:</label>
    <input type="text" name="description" required>

    <label for="status">Estado:</label>
    <select name="status" required>
        <option value="pendiente">Pendiente</option>
        <option value="en_ejecucion">En ejecución</option>
        <option value="terminada">Terminada</option>
    </select>

    <label for="start_time">Hora de inicio:</label>
    <input type="datetime-local" name="start_time" required>

    <label for="created_by">Creada por:</label>
    <input type="text" name="created_by" required>

    <button type="submit">Crear tarea</button>
</form>


</body>
</html>