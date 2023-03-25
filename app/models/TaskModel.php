<?php 
class TaskModel {
    private $tasks;

    public function __construct($json_file) {
        if (file_exists($json_file)) {
            $tasks_json = file_get_contents($json_file);
            $this->tasks = json_decode($tasks_json);
        } else {
            $this->tasks = array();
        }
    }

    public function addTask($task) {
        $this->tasks[] = $task;
        $this->saveTasksToJson();
    }

    public function getTaskById($id) {
        foreach ($this->tasks as $task) {
            if ($task->getId() == $id) {
                return $task;
            }
        }
        return null;
    }

    public function getAllTasks() {
        return $this->tasks;
    }

    public function listTasksByStatus($status)
    {
        $tasks = $this->readTasks();
        $filteredTasks = array();
        foreach ($tasks as $task) {
            if ($task['status'] == $status) {
                $filteredTasks[] = $task;
            }
        }
        return $filteredTasks;
    }
    

    public function updateTaskStatus($id, $status) {
        foreach ($this->tasks as &$task) {
            if ($task->getId() == $id) {
                $task->setStatus($status);
                $task->setStartTime(date("Y-m-d H:i:s")); // Se establece la hora de inicio al actualizar el estado de la tarea
                $this->saveTasksToJson();
                return;
            }
        }
    }

/*
public function updateTask($id, $status, $start_time, $end_time, $user)
{
    $tasks = $this->readTasks();
    foreach ($tasks as $key => $task) {
        if ($task['id'] == $id) {
            $tasks[$key]['status'] = $status;
            $tasks[$key]['start_time'] = $start_time;
            $tasks[$key]['end_time'] = $end_time;
            $tasks[$key]['user'] = $user;
            break;
        }
    }
    $this->writeTasks($tasks);
}

*/

    public function deleteTask($id) {
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() == $id) {
                unset($this->tasks[$key]);
                $this->saveTasksToJson();
                return;
            }
        }
    }

    // public function deleteTask($id)
    // {
    //     $tasks = $this->readTasks();
    //     foreach ($tasks as $key => $task) {
    //         if ($task['id'] == $id) {
    //             unset($tasks[$key]);
    //             break;
    //         }
    //     }
    //     $this->writeTasks($tasks);
    // }
    


    private function saveTasksToJson() {
        file_put_contents("tasks.json", json_encode($this->tasks));
    }
}

?>