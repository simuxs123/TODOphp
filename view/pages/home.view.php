
<?php require("view/_partials/head.view.php");?>
<?php require("view/_partials/header.view.php");?>
<?php
use TodoApp\DB;
use TodoApp\Task;
    $connection=DB::connect();
    $tasks=new Task($connection);
?>
<div class="container-lg mt-5 ">
    <div class="text-center my-4">
        <a class=" btn btn-primary" href="add-task">Add task</a>
    </div>
    <div class="row rounded text-center">
        <div class="col-3">
            <div class="row">
                <div class="col-sm-4  col-md-3 title-box"><i class="fas fa-project-diagram"></i></div>
                <div class="col-sm-8 col-md-9 title-box">Subject</div>
            </div>
        </div>
        <div class="col-1 title-box" >Priority</div>
        <div class="col-3 ">
            <div class="row">
                <div class="col-6 title-box">Due date</div>
                <div class="col-6 title-box">Status</div>
            </div>
        </div>
        <div class="col-5">
            <div class="row">
                <div class="col-6 title-box">Percent completed</div>
                <div class="col-6 title-box">Modified on</div>
            </div>
        </div>
    </div>
    <?php foreach ($tasks->allTasks() as $task):?>
    <div class="row list-row align-items-center py-2">
        <div class="col-3 ">
            <div class="row align-items-center">
                <div class="logo col-sm-4  col-md-3 "><i class="fas fa-user-check"></i></div>
                <div class="col-sm-8 col-md-9  d-flex "><span class="logoCheck pr-3">
                        <a href="complete-tasks/<?=$task['id']?>">
                            <i class="fas fa-check
                                <?php if($task['status']): ?>
                                    green
                                <?php endif; ?>">
                            </i></a></span><?= $task['subject']?></div>
            </div>
        </div>
        <div class="col-1 text-center pill-box"><span class="pill high"><?= $task['priority']?></span></div>
        <div class="col-3 ">
            <div class="row align-items-center text-center">
                <div class="col-6 "><?= $task['due_date']?></div>
                <div class="col-6 ">
                    <?php if(!$task['status']): ?>
                        In progress
                    <?php else: ?>
                        Completed
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="row align-items-center ">
                <div class="col-6 position-relative">
                    <?php if(!$task['status']): ?>
                        0%<span class="progression"><span class="progression0"></span></span></div>
                    <?php else: ?>
                        100%<span class="progression"><span class="progression100"></span></span></div>
                    <?php endif;?>

                <div class="col-6 text-center"><?= $task['modified_date'] ?><span class="exit"><a href="delete-tasks/<?=$task['id']?>"><i class="far fa-times-circle"></i></a></span></div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php require("view/_partials/footer.view.php");?>