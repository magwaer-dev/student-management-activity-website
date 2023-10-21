<?php
session_start();
require '../php/conectare.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylee.css" rel="stylesheet">

    <title>Task Edit</title>
</head>
<body>

<div id="content">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Actualizează Task
                            <a href="../log_reg/php/tasks.php" class="btn btn-danger float-end">Înapoi</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_task']))
                        {
                            $id_task = mysqli_real_escape_string($conn, $_GET['id_task']);
                            $query = "SELECT * FROM tasks WHERE id_task='$id_task' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $tasks = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code_tasks.php" method="POST">
                                    <input type="hidden" name="id_task" value="<?= $tasks['id_task']; ?>">
                                    
                                    <div class="mb-3">
                                        <label>Task-ul</label>
                                        <input type="text" name="title" value="<?=$tasks['title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Data</label>
                                        <input type="date" name="date" value="<?=$tasks['date'];?>" class="form-control">
                                    </div>
                                            <div class="mb-3">
                                        <label>Începe la ora</label>
                                        <input type="time" name="start_event" value="<?=$tasks['start_event'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Termină la ora</label>
                                        <input type="time" name="end_event" value="<?=$tasks['end_event'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_task" class="btn btn-primary">
                                            Actualizează task-ul
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>