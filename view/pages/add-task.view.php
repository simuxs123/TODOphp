<?php require("view/_partials/head.view.php");?>
<?php require("view/_partials/header.view.php");?>

    <section>
        <h2 class="text-center">Add task</h2>
        <form method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="subject" placeholder="Enter subject">
                <?php if (isset($_SESSION['error'])): ?>
                    <span class="warning"><?= $_SESSION['error']['title'];?></span>
                <?php endif;?>
            </div>
            <div class="form-group">
                <select name="priority" class="form-control">
                    <option value="">Priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
                <?php if (isset($_SESSION['error'])): ?>
                    <span class="warning"><?= $_SESSION['error']['priority'];?></span>
                <?php endif;?>
            </div>
            <div class="form-group">
                <label>Atlikimo data</label>
                <input class="form-control" type="date" name="dueDate">
                <?php if (isset($_SESSION['error'])): ?>
                    <span class="warning"><?= $_SESSION['error']['date'];?></span>
                <?php endif;?>
            </div>
            <button type="submit" name="send">Add</button>
        </form>
    </section>
<?php require("view/_partials/footer.view.php");?>