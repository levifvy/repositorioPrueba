<?php 

require_once('controller/TasksController.php');
$tasksController = new TasksController();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id'])) {
    $tasksController->show((int)$_GET['id']);
  } else {
    $tasksController->index();
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['_method'])) {
    if ($_POST['_method'] === 'PUT') {
      $tasksController->update(
        (int)$_POST['id'],
        (string)$_POST['name'],
        (int)$_POST['status'],
        (string)$_POST['start_time'],
        (string)$_POST['end_time'],
        (int)$_POST['user']
      );
    } elseif ($_POST['_method'] === 'DELETE') {
      $tasksController->destroy((int)$_POST['id']);
    }
  } else {
    $tasksController->store(
      (string)$_POST['name'],
      (string)$_POST['description'],
      (int)$_POST['status'],
      (string)$_POST['start_time'],
      (string)$_POST['end_time'],
      (int)$_POST['user']
    );
  }
}

?>