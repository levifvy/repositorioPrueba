<?php

require_once "models/Task.php";
require_once "controllers/TaskController.php";

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos la tarea a actualizar
    $taskController = new TaskController();
    $task = $taskController->get($_POST["id"]);

    // Actualizamos la tarea con los datos ingresados en el formulario
    $task->setDescription($_POST["description"]);
    $task->setStatus($_POST["status"]);
    $task->setStartTime($_POST["start_time"]);
    $task->setEndTime($_POST["end_time"]);
    $task->setCreatedBy($_POST["created_by"]);

    // Guardamos los cambios en la base de datos
    $taskController->update($task);

    // Redirigimos a la página principal
    header("Location: index.php");
    exit();
}

// Mostramos el formulario para editar una tarea existente
$taskController = new TaskController();
$task = $taskController->get($_GET["id"]);
require_once "views/update_task.php";

?>