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

    <title>Student Edit</title>
</head>
<body>

<div id="content">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Actualizează Lecție 
                            <a href="../log_reg/php/home.php" class="btn btn-danger float-end">Înapoi</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_lectie']))
                        {
                            $id_lectie = mysqli_real_escape_string($conn, $_GET['id_lectie']);
                            $query = "SELECT * FROM lectii WHERE id_lectie='$id_lectie' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $lectii = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id_lectie" value="<?= $lectii['id_lectie']; ?>">

                                    <div class="mb-3">
                                        <label>Ziua</label> <!-- să fie ziua pusă corect -->
                                        <select name="ziua"class="form-control" method="POST" >
                                        <option value="<?=$lectii['ziua'];?>" selected="selected"> <?=$lectii['ziua'];?> </option>
                                          <option value="Luni">Luni</option>
                                          <option value="Marți">Marți</option>
                                          <option value="Miercuri">Miercuri</option>
                                          <option value="Joi">Joi</option>
                                          <option value="Vineri">Vineri</option>
                                          <option value="Sâmbătă">Sâmbătă</option>
                                          <option value="Duminică">Duminică</option>
                                        </select> 
                                      </div>
                                    <div class="mb-3">
                                        <label>Lecția</label>
                                        <input type="text" name="lectia" value="<?=$lectii['lectia'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Începe ora</label>
                                        <input type="time" name="start_hour" value="<?=$lectii['start_hour'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Termină ora</label>
                                        <input type="time" name="end_hour" value="<?=$lectii['end_hour'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_lectie" class="btn btn-primary">
                                            Actualizează lecția
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