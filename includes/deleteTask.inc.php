<?php

require_once "../Classes/User";
require_once "../Classes/Task";

if($_SERVER["REQUEST_METHOD"] === 'GET'){
    $taskID = $_GET['taskID'];
   
}
$newTask = new Task("","","","");
$newTask->deleteTask($taskID);

header("location: ../index.php");
exit();
