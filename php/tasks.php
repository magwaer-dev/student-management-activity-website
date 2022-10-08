<?php
    session_start();
    require '../php/conectare.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task-uri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylee.css" rel="stylesheet">
    
</head>

<body>
   <?php require '../php/navbar.php'; ?>

  <div id="content2">

<?php include('../crud/message.php'); ?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Task-uri
                    <a href="../crud/task-create.php" class="btn btn-primary float-end">Adaugă task</a>
                </h4>
            </div>
            <div class="card-body">
                <table cellspacing="2" class="table table-bordered table-striped">
                    <thead >
                        <tr>
                          <th>Numele</th>  
                          <th>Data</th>  
                          <th>Început</th>
                          <th>Sfârșit</th>
                          <th>Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php    
                        $zile=array("Luni", "Marți", "Miercuri", "Joi", "Vineri", "Sâmbătă", "Duminică");
                        $days=array("Mon", "Tue", "Wen", "Thu", "Fri", "Sat", "Sun");               
                            $query = "SELECT * FROM tasks ORDER BY tasks.date, tasks.start_event;"; //sortează după data și inceput
                            $query_run = mysqli_query($conn, $query);
                            $rowcount = mysqli_num_rows($query_run);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $tasks)
                                {
                                $timestamp = strtotime($tasks['date']);
                                $day = date('D', $timestamp); // din 08-10-2022 transformă în Sat
                                $i= array_search($day, $days);
                                ?>                                        
                                    <td><?= $tasks['title']; ?></td>
                                    <td><?=$zile[$i].date(', d-m-Y', strtotime($tasks['date'])); ?></td>
                                    <!--   //formatul datei să fie: Tue, 08-10-2022 -->
                                    <td><?= $tasks['start_event']; ?></td>
                                    <td><?= $tasks['end_event']; ?></td>
                                    <td>                                    
                                        <a href="../crud/task-edit.php?id_task=<?= $tasks['id_task']; ?>" class="btn btn-success btn-sm">Editează</a>
                                        <form action="../crud/code_tasks.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_task" value="<?=$tasks['id_task'];?>" class="btn btn-danger btn-sm">Șterge</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            else { echo "<h5> Nu au fost găsite înregistrări </h5>"; }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>