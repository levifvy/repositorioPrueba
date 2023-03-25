<?php 
class Task {
    private $id;
    private $description;
    private $status;
    private $start_time;
    private $end_time;
    private $created_by;

    public function __construct($id, $description, $status, $start_time, $end_time, $created_by) {
        $this->id = $id;
        $this->description = $description;
        $this->status = $status;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->created_by = $created_by;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function getEndTime() {
        return $this->end_time;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }
}
?>