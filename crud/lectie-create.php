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

    <title>Creează Lecție</title>
</head>
<body>

<div id="content">

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adaugă lecție 
                            <a href="../php/index.php" class="btn btn-danger float-end">Înapoi</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Ziua</label>
                                <select name="ziua"class="form-control" method="POST" >
                                  <option value="" selected="selected" >-Ziua-</option>
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
                                <input type="text" name="lectia" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Începe ora</label>
                                <input type="time" name="start_hour" min="05:00" max="23:00" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Termină ora</label>
                                <input type="time" name="end_hour" min="05:00" max="23:00" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_lectie" class="btn btn-primary">Salvează</button>
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
