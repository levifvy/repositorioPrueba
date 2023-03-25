<?php

require_once "controllers/TaskController.php";

// Obtenemos la tarea a eliminar
$taskController = new TaskController();
$task = $taskController->get($_GET["id"]);

// Eliminamos la tarea de la base de datos
$taskController->delete($task);

// Redirigimos a la página principal
header("Location: index.php");
exit();
