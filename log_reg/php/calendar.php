<?php 
session_start();
require '../../php/conectare.php';

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../stylee.css" rel="stylesheet">
</head>

<body>
<?php require '../php/navbar.php'; ?>

<a href=""><img src="../../img/calendar.img"  class="center" width="50%"></a>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>