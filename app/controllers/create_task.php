<?php

require_once "models/Task.php";
require_once "controllers/TaskController.php";

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Creamos una nueva tarea
    $task = new Task();
    $task->setDescription($_POST["description"]);
    $task->setStatus($_POST["status"]);
    $task->setStartTime($_POST["start_time"]);
    $task->setCreatedBy($_POST["created_by"]);

    // Agregamos la tarea a la base de datos
    $taskController = new TaskController();
    $taskController->create($task);

    // Redirigimos a la página principal
    header("Location: index.php");
    exit();
}

// Mostramos el formulario para crear una nueva tarea
require_once "views/create_task.php";
