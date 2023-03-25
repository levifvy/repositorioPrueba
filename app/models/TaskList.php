<?php
class TaskList {
    private $filename;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    private function readTasks()
    {
        $data = file_get_contents($this->filename);
        $tasks = json_decode($data, true);
        return $tasks;
    }

    private function writeTasks($tasks)
    {
        $data = json_encode($tasks);
        file_put_contents($this->filename, $data);
    }

    public function addTask($name, $status, $start_time, $end_time, $user)
    {
        $tasks = $this->readTasks();
        $id = 1;
        if (count($tasks) > 0) {
            $lastTask = end($tasks);
            $id = $lastTask['id'] + 1;
        }
        $newTask = array(
            'id' => $id,
            'name' => $name,
            'status' => $status,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user' => $user
        );
        $tasks[] = $newTask;
        $this->writeTasks($tasks);
        return $id;
    }

    public function listAllTasks()
    {
        $tasks = $this->readTasks();
        return $tasks;
    }

    public function listTaskById($id)
    {
        $tasks = $this->readTasks();
        foreach ($tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        return null;
    }

    public function updateTask($id, $status, $start_time, $end_time, $user)
    {
        $tasks = $this->readTasks();
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                $task['status'] = $status;
                $task['start_time'] = $start_time;
                $task['end_time'] = $end_time;
                $task['user'] = $user;
                $this->writeTasks($tasks);
                return true;
            }
        }
        return false;
    }
}
?>