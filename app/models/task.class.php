<?php 
require_once __DIR__.'../../../lib/base/Model.php';
class task extends Model {

    private $jsonFile;
    private $tasks;

    //constructor

    public function __construct()
    {
        $this-> jsonFile = file_get_contents( __DIR__.'../../../web/database.json');
        $this-> tasks= json_decode($this->jsonFile,true);
    }


    public function getTasks(){

        return $this->tasks;

//prueba
    //    echo '<pre>';
    //     var_dump($this->tasks) ;
             
        
    }

    function getTaskById($id){

        $users= $this->tasks;
        foreach($users as $user){
            if($user['id'] == $id){
                return $user;
                // echo '<pre>';
                // var_dump($user);
            }
        }
        return null;



    }

    function createTask($data){
        $this-> tasks= json_encode($this->jsonFile,true);
        $this-> jsonFile = file_put_contents( __DIR__.'../../../web/database.json', $data, FILE_APPEND);
    }

    // function updateTask($data,$id){
    //     $users= $this->tasks;
    //     foreach($users as $i => $user){
    //         if($user['id'] == $id){

    //         }


    // }

    function deleteTask($id){

        
    }

    function editTask($id){
        
    }

        
}

?>