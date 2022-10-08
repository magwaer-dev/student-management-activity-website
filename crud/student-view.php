<?php
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

    <title>lectii View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>lectii View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $lectii_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM lectii WHERE id='$lectii_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $lectii = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>lectii Name</label>
                                        <p class="form-control">
                                            <?=$lectii['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>lectii Email</label>
                                        <p class="form-control">
                                            <?=$lectii['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>lectii Phone</label>
                                        <p class="form-control">
                                            <?=$lectii['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>lectii Course</label>
                                        <p class="form-control">
                                            <?=$lectii['course'];?>
                                        </p>
                                    </div>

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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>