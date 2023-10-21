<?php 
session_start();
require '../php/conectare.php';

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

  <div id="content">
    
      <?php
      
echo '<br> ';

      require_once('conectare.php');
      echo'
        <form method="GET">
          <br>Introduceți task-ul nou<br><br>
          <input type="text" id="title" name="title" method="GET" placeholder="Task-ul" >
          <label for="start_event">Alege data:</label>
          <input type="date" id="date" name="date"  required method="GET">
          <label for="start_event">Alege ora:</label>
        <input type="time" id="start_event" name="start_event" min="00:01" max="23:59" required method="GET">
        <input type="time" id="end_event" name="end_event" min="00:01" max="23:59" required method="GET" >
          <input name="submit1" type="submit" class="btn btn-primary" style="background-color: #FD6435; border-color: #FD6435" value="Adaugă"><br>
        </form>';
        
        if(isset($_GET['title'])) 
        { 
    
          $title = $_GET['title'];
          $date = $_GET['date'];
          $start_event = $_GET['start_event'];
          $end_event = $_GET['end_event'];

     /*     $sql1 = "INSERT INTO `tasks` (`title`, `date` , `start_event`, `end_event`) VALUES
          ('$title','$date', '$start_event',  '$end_event');";
          $res1 = mysqli_query($conn, $sql1);
          if( (!$res1) && (isset($_GET['submit1'])) && ($end_event<$start_hour) ){
          echo '<p style="color:red">Eroare la introducere</p>';
          }
          else {          
               echo '<p style="color:green">Datele au fost introduse cu succes</p>';
              //header('location:tasks.php');}*/


$zile=array("Luni", "Marți", "Miercuri", "Joi", "Vineri", "Sâmbătă", "Duminică");
$days=array("Mon", "Tue", "Wen", "Thu", "Fri", "Sat", "Sun");


               $timestamp = strtotime($date);

            $day = date('D', $timestamp);
            echo $day.'<br>';


            $i= array_search($day, $days); //returnează index-ul
            echo $i.'<br>';
            $sql = "SELECT  COUNT(*) as total FROM lectii WHERE 
                    lectii.start_hour BETWEEN '".$start_event."' AND '".$end_event."'
                    AND ziua = '$zile[$i]'
                    AND lectii.end_hour BETWEEN '".$start_event."' AND '".$end_event. "'";
$res = $conn->query($sql);
$value = mysqli_fetch_assoc($res);
echo $value['total'];

echo '<br>';
$datee=date('d-m-Y', strtotime($_GET['date']));
echo $datee;
}







echo '<br> <br>';
require_once('conectare.php');

$i = 1;
$zi="Vineri";
$sql = "SELECT * FROM history ;";

echo '
Lista task-urilor șterse
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Numele</b></th>  
  <th><b>Data</b></th>  
  <th><b>Început</b></th>
  <th><b>Sfârșit</b></th>
</tr><br> <br>
';

$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT title FROM history WHERE id_task =".$row['id_task'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);
  
  echo'<td align="center">'.$ro['title'].'</td>';
  echo'<td align="center">'.date('d-m-Y', strtotime($row['date'])).'</td>';
  //formatul datei să fie: 08-10-2022
  echo'<td align="center">'.$row['start_event'].'</td>';
  echo'<td align="center">'.$row['end_event'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';
?>

</div>

<script type="text/javascript"> //pentru ca datele să se păstreze după trimiterea formularului
  document.getElementById('title').value = "<?php echo $_GET['title'];?>";
  document.getElementById('date').value = "<?php echo $_GET['date'];?>";
  document.getElementById('start_event').value = "<?php echo $_GET['start_event'];?>";
  document.getElementById('end_event').value = "<?php echo $_GET['end_event'];?>";
</script>

</body></html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>