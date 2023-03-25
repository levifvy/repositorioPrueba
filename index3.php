<?php
require_once 'controller/TasksController.php';

// Crea una instancia del controlador
$controller = new TasksController();

// Determina la acción a realizar
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list';
}

// Ejecuta la acción correspondiente
switch ($action) {
    case 'list':
        $controller->listTasks();
        break;
    case 'create':
        $controller->createTask();
        break;
    case 'update':
        $controller->updateTask();
        break;
    case 'delete':
        $controller->deleteTask();
        break;
    case 'view':
        $controller->viewTask();
        break;
    default:
        $controller->listTasks();
        break;
}
