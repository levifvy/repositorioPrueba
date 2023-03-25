<?php
require_once 'model/TaskModel.php';
require_once 'view/TaskView.php';

class TasksController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
    }

    public function listTasks() {
        $tasks = $this->model->getAllTasks();
        $this->view->showTasks($tasks);
    }

    public function createTask() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $taskData = array(
                'description' => $_POST['description'],
                'created_by' => $_POST['created_by']
            );
            $this->model->createTask($taskData);
            header('Location: index.php');
        } else {
            $this->view->showCreateTaskForm();
        }
    }

    public function updateTask() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $taskData = array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'start_time' => $_POST['start_time'],
                'end_time' => $_POST['end_time'],
                'created_by' => $_POST['created_by']
            );
            $this->model->updateTask($taskData);
            header('Location: index.php');
        } else {
            $taskId = $_GET['id'];
            $task = $this->model->getTaskById($taskId);
            $this->view->showUpdateTaskForm($task);
        }
    }

    public function deleteTask() {
        $taskId = $_GET['id'];
        $this->model->deleteTask($taskId);
        header('Location: index.php');
    }

    public function viewTask() {
        $taskId = $_GET['id'];
        $task = $this->model->getTaskById($taskId);
        $this->view->showTaskDetails($task);
    }
}
