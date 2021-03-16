<?php

use TodoApp\DB;
use TodoApp\Task;
use TodoApp\Request;

$connection = DB::connect();
$tasks = new Task($connection);
$tasks->deleteTask(intval(basename(Request::uri())));
