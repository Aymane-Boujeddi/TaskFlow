<?php


require_once "../Classes/Connect";
require_once "../Classes/Task";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newStatus = $_POST["new_status"];
    $modifyTaskID = $_POST["taskID"];

    $modifyTask = new Task("", "", "", "");
    $modifyTask->modifyTask($newStatus, $modifyTaskID);

    header("location: ../index.php");
    exit();
}
echo $newStatus;
echo $modifyTaskID;
