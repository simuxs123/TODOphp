<?php
use TodoApp\DB;
use TodoApp\Task;
use TodoApp\Validation;

session_start();

if(isset($_POST['send'])){
    $connection=DB::connect();
    $error=Validation::validate($_POST);
    if(empty(implode("",$error))){
        $task=new Task($connection);
        $task->createTask($_POST);
        require ('view/pages/add-task.view.php');
    } else {
        $_SESSION['error'] = $error;
        require ('view/pages/add-task.view.php');
    }
} else {
    unset($_SESSION['error']);
    require ('view/pages/add-task.view.php');
}

