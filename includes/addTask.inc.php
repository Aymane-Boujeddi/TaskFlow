<?php

require_once "../Classes/Connect";
require_once "../Classes/Task";

if($_SERVER["REQUEST_METHOD"] = $_POST){
    $taskTitle = $_POST["taskTitle"];
    $taskContent = $_POST["taskDescription"];
    $taskType = $_POST["taskType"];
    $taskOwner = $_POST["taskAssignee"];
  

    $newTask = new Task($taskContent,$taskTitle,$taskType,$taskOwner);
    if($newTask){
        $newTask->createTask();
        header("Location: ../index.php");
        exit();
    }else{
        die("Task not created ");
    }

}
