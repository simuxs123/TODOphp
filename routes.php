<?php
use TodoApp\Router;
$router=new Router();
$router->define([
   '/'=>'controllers/home.php',
   '/complete-tasks'=>'controllers/complete-tasks.php',
    '/delete-tasks'=>'controllers/delete-tasks.php',
   '/add-task'=>'controllers/add-task.php',
   '404'=>'controllers/404.php'
]);
