<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css"/>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	<title>To Do List</title>
</head>
<body>
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6 well">
            <h3 class="text-primary">TO DO LIST</h3>
            <hr style="border-top:1px dotted #ccc;"/>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <center>
                    <form method="POST" class="form-inline" action="add_query.php">
                        <input type="text" class="form-control" name="task" required placeholder="Enter your task"/>
                        <button class="btn btn-primary form-control" name="add">ADD TASK</button>
                    </form>
                </center>
            </div>
            <br /><br /><br />
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'conn.php';
                        $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
                        $count = 1;
                        while($fetch = $query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td><?php echo $fetch['task']?></td>
                        <td><?php echo $fetch['status']?></td>
                        <td>
                            <center>
                                <?php
                                    if($fetch['status'] != "Done"){
                                        echo 
                                        '<a href="update_task.php?task_id='.$fetch['task_id'].'" class="btn btn-success"><span class="glyphicon glyphicon-check"></span></a> |';
                                    }
                                ?>
                                <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </center>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>