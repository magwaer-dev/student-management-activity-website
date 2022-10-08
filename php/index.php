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
            <a href="#">Orar</a>
            
          </button>
        </div> 
        <div class="dropdown">
          <button class="dropbtn">
           <a href="tasks.php">Task-uri</a>
            
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

<br>
    <table border=1 cellspacing="0">

        <tr> 
         <th colspan="6"> Orarul gr. IA-202</th>
        </tr>
        
        <tr>
         <th> Ora </th>
         <th> Luni </th>
         <th> Marti </th>
         <th> Miercuri </th>
         <th> Joi</th>
         <th> Vineri </th>
        </tr>
        
        <tr>
         <th> 8:00/9:30 </th>
         <td>  </td>
         <td> </td>
         <td></td>
         <td> lab. DAW </td>
         <td> </td>
        </tr>
        <tr>
            <th colspan="6"> pauza 15 min </th>
        </tr>
           
        
        <tr>
         <th> 9:45/11:15 </th>   
         <td> curs Antrep </td>
         <td> curs SIA</td>
         <td> curs MP</td>
         <td> curs SBC </td>
         <td> </td>
        </tr>
        <tr>
            <th colspan="6"> pauza 15 min </th>
        </tr>
           
        
        
        
           <tr>
            <th> 11:30/13:00 </th>
            <td>curs Antrep</td>
            <td>curs SIA</td>
            <td>curs MP</td>
            <td>curs SBC</td>
            <td></td>
           </tr>

           <tr>
            <th colspan="6"> pauza 30 min </th>
           </tr>

           <tr>
            <th> 13:30/15:00 </th>
            <td>curs SBC</td>
            <td>lab SIA</td>
            <td>lab SBC</td>
            <td></td>
            <td></td>
           </tr>
           
           <tr>
            <th colspan="6"> pauza 15 min </th>
           </tr>
           
           <tr>
            <th> 15:15/16:45 </th>
            <td>sem APSI</td>
            <td></td>
            <td></td>
            <td></td>
            <td>curs DAW</td>
           </tr>

           <tr>
            <th colspan="6"> pauza 15 min </th>
           </tr>

           <tr>
            <th> 17:00/18:30 </th>
            <td></td>
            <td></td>
            <td></td>
            <td>curs DAW</td>
            <td> </td>
           </tr>
        
        </table>
 <div>

  <!-- <div class="container">
    <button class="btn btn-primary my-5"><a href="adauga.php"
    class="text-light"> Adauga orar</a>
</div> -->



      <?php
      require_once('conectare.php');
      echo'
        <form method="GET"> <br>
        Introduceți orarul nou<br><br>
        <select name="ziua" method="GET" >
          <option value="Luni" selected="selected" disabled="disabled">-Ziua-</option>
          <option value="Luni">Luni</option>
          <option value="Marți">Marți</option>
          <option value="Miercuri">Miercuri</option>
          <option value="Joi">Joi</option>
          <option value="Vineri">Vineri</option>
          <option value="Sâmbătă">Sâmbătă</option>
          <option value="Duminică">Duminică</option>
        </select> 
        <input type="text" name="lectia" method="GET" placeholder="Lecția" >
        <label for="start_hour">Alege ora:</label>
        <input type="time" id="start_hour" name="start_hour" min="05:00" max="23:00" required method="GET">
        <input type="time" id="end_hour" name="end_hour" min="05:00" max="23:00" required method="GET" >
              <input name="submit1" type="submit" value="Adaugă"><br>
        </form>';


        
        if(isset($_GET['ziua'])) 
        { 
    
          $lectia = $_GET['lectia'];
          $ziua = $_GET['ziua'];          
          $start_hour = $_GET['start_hour'];
          $end_hour = $_GET['end_hour'];

          $sql1 = "INSERT INTO `lectii` (`lectia`,`ziua`, `start_hour`, `end_hour`) VALUES
          ('$lectia',  '$ziua',  '$start_hour',  '$end_hour');";
          $res1 = mysqli_query($conn, $sql1);
          if( (!$res1) && (isset($_GET['submit1'])) ){
          echo '<p style="color:red">Eroare la introducere</p>';
          }
          else {
          
              header('location:index.php');
              // echo '<p style="color:green">Datele au fost introduse cu succes</p>';
          }   
        }
    
require_once('conectare.php');

$i = 1;
$zi="Luni";
$sql = "SELECT * FROM lectii WHERE ziua ='$zi';";

echo '<br>
Lista lecțiilor Luni
  <table width="90%" border="1" cellspacing="2">
  <tr>

  <th><b>Ziua</b></th>  
  <th><b>Lecția</b></th>
  <th><b>Start</b></th>
  <th><b>End</b></th>
  <th><b>Operatii</b>
  </th>
</tr><br> <br>
<td align="center" rowspan="6"> Luni </td>'; 
?>

<?php
$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT lectia FROM lectii WHERE id_lectie =".$row['id_lectie'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);

  echo'<td align="center">'.$ro['lectia'].'</td>';
  echo'<td align="center">'.$row['start_hour'].'</td>';
  echo'<td align="center">'.$row['end_hour'].'</td> </tr>';
  
  $i+=1;
}
echo '</table>';

echo '<br> ';


require_once('conectare.php');

$i = 1;
$zi="Marți";
$sql = "SELECT * FROM lectii WHERE ziua ='$zi';";

echo '<br>
Lista lecțiilor Marți
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Ziua</b></th>  
  <th><b>Lecția</b></th>
  <th><b>Start</b></th>
  <th><b>End</b></th>
  
</tr><br> <br>
<td align="center" rowspan="6"> Marti </td>'; 

?>

<?php
$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT lectia FROM lectii WHERE id_lectie =".$row['id_lectie'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);
  echo'<td align="center">'.$ro['lectia'].'</td>';
  echo'<td align="center">'.$row['start_hour'].'</td>';
  echo'<td align="center">'.$row['end_hour'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';

require_once('conectare.php');

$i = 1;
$zi="Miercuri";
$sql = "SELECT * FROM lectii WHERE ziua ='$zi';";

echo '
Lista lecțiilor Miercuri
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Ziua</b></th>  
  <th><b>Lecția</b></th>
  <th><b>Start</b></th>
  <th><b>End</b></th>
</tr><br> <br>
<td align="center" rowspan="6"> Miercuri </td>'; 

?>

<?php
$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT lectia FROM lectii WHERE id_lectie =".$row['id_lectie'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);
  echo'<td align="center">'.$ro['lectia'].'</td>';
  echo'<td align="center">'.$row['start_hour'].'</td>';
  echo'<td align="center">'.$row['end_hour'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';

require_once('conectare.php');

$i = 1;
$zi="Joi";
$sql = "SELECT * FROM lectii WHERE ziua ='$zi';";

echo '
Lista lecțiilor Joi
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Ziua</b></th>  
  <th><b>Lecția</b></th>
  <th><b>Start</b></th>
  <th><b>End</b></th>
</tr><br> <br>
<td align="center" rowspan="6"> Joi </td>'; 

?>

<?php
$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT lectia FROM lectii WHERE id_lectie =".$row['id_lectie'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);

  echo'<td align="center">'.$ro['lectia'].'</td>';
  echo'<td align="center">'.$row['start_hour'].'</td>';
  echo'<td align="center">'.$row['end_hour'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';
require_once('conectare.php');

$i = 1;
$zi="Vineri";
$sql = "SELECT * FROM lectii WHERE ziua ='$zi';";

echo '
Lista lecțiilor Vineri
  <table width="90%" border="1" cellspacing="2">
  <tr>
  <th><b>Ziua</b></th>  
  <th><b>Lecția</b></th>
  <th><b>Start</b></th>
  <th><b>End</b></th>
</tr><br> <br>
<td align="center" rowspan="6"> Vineri </td>'; 

?>

<?php
$rez = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($rez)) {  
  $sqli = "SELECT lectia FROM lectii WHERE id_lectie =".$row['id_lectie'].";";
  $count = mysqli_query($conn, $sqli);
  $ro = mysqli_fetch_assoc($count);
  
  echo'<td align="center">'.$ro['lectia'].'</td>';
  echo'<td align="center">'.$row['start_hour'].'</td>';
  echo'<td align="center">'.$row['end_hour'].'</td> </tr>';
  $i+=1;
}
echo '</table>';
echo '<br> <br>';
?>

 </div>
</div>
</body>
</html>