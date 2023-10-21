<?php
session_start();
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

    <title>Creează Task</title>
</head>
<body>

<div id="content">

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adaugă task 
                            <a href="../log_reg/php/tasks.php" class="btn btn-danger float-end">Înapoi</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code_tasks.php" method="POST">

                            <div class="mb-3">
                                <label>Task-ul</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Data</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Începe la ora</label>
                                <input type="time" name="start_event" min="00:01" max="23:59" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Termină la ora</label>
                                <input type="time" name="end_event" min="00:01" max="23:59" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_task" class="btn btn-primary">Salvează</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

   

</body>
</html>