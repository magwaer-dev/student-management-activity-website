<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/stylee.css" rel="stylesheet">

</head>

<body>
  <div id="content">
    
    <div class="aaa">
      <div class="navbar">
        <div class="dropdown">
          <button class="dropbtn">
            <a href="index.php">Orar</a>
            
          </button>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">
           <a href="#">Task-uri</a>
            
          </button>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">
            <a href="calendar.php">Calendar</a>
          </button>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">
            <a href="history.php">Istoric</a>
          </button>
        </div> 
      </div>
    </div>

      <?php
      require_once('conectare.php');
      echo'
        <form method="GET">
        <br>Introduceți task-ul nou<br><br>
        <input type="text" name="title" method="GET" placeholder="Task-ul" >
        <label for="start_event">Alege ora:</label>
        <input type="datetime-local" id="start_event" name="start_event"  required method="GET">
        <input type="datetime-local" id="end_event" name="end_event" m required method="GET" >
              <input name="submit1" type="submit" class="btn btn-primary" style="background-color: #FD6435; border-color: #FD6435" value="Adaugă"><br>
        </form>';
        
        if(isset($_GET['title'])) 
        { 
    
          $title = $_GET['title'];
          $start_event = $_GET['start_event'];
          $end_event = $_GET['end_event'];

          $sql1 = "INSERT INTO `tasks` (`title`, `start_event`, `end_event`) VALUES
          ('$title', '$start_event',  '$end_event');";
          $res1 = mysqli_query($conn, $sql1);
          if( (!$res1) && (isset($_GET['submit1'])) ){
          echo '<p style="color:red">Eroare la introducere</p>';
          }
          else {          
               echo '<p style="color:green">Datele au fost introduse cu succes</p>';
              //header('location:tasks.php');

          }   
        } 

echo '<br> <br>';
require_once('conectare.php');

$i = 1;
$zi="Vineri";
$sql = "SELECT * FROM tasks ;";

echo '
Lista task-urilor
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Numele</b></th>  
  <th><b>Început</b></th>
  <th><b>Sfârșit</b></th>
</tr><br> <br>
';

$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT title FROM tasks WHERE id_task =".$row['id_task'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);
  
  echo'<td align="center">'.$ro['title'].'</td>';
  echo'<td align="center">'.$row['start_event'].'</td>';
  echo'<td align="center">'.$row['end_event'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';
?>


       </div></body></html>

