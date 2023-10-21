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

    <title>Orar</title>
    <link href="../stylee.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body >
<?php require '../php/navbar.php'; ?>

  <div id="content2">
    <div id="content">
    <table  border=1 cellspacing="0" >
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
    </div>
 <div>

  <!-- <div class="container">
    <button class="btn btn-primary my-5"><a href="adauga.php"
    class="text-light"> Adauga orar</a>
</div> -->


<div class="container mt-4">

<?php include('../../crud/message.php'); ?> 

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Orar
                    <a href="../../crud/lectie-create.php" class="btn btn-primary float-end">Adaugă lecție</a>
                </h4>
            </div>
            <div class="card-body">

                <table cellspacing="2" style="vertical-align: middle;" class="table table-bordered table-striped">
                    <thead >
                        <tr>
                            <th>Ziua</th>
                            <th>Lecția</th>
                            <th>Începe ora</th>
                            <th>Termină ora</th>
                            <th>Acțiuni</th>
                        </tr>
                    </thead>
                    <tbody > <!--aliniere pe centru la „luni”...-->
                        <?php 
                            $zi=array("Luni", "Marți", "Miercuri", "Joi", "Vineri", "Sâmbătă", "Duminică");

                            for ($x = 0; $x < 7; $x++) { //pana duminica
                                 
                                $query = "SELECT * FROM lectii WHERE ziua = '$zi[$x]' ORDER BY start_hour;"; //sortează după început
                                $query_run = mysqli_query($conn, $query);
                                $rowcount = mysqli_num_rows($query_run);
                                echo'
                                 <td style="font-weight:bold; " rowspan= "' .$rowcount; 
                                 if ($rowcount==0) {continue;} //dacă ziua nu are înreg, nu e afisata
                                 echo ' " > '.$zi[$x]; echo '</td> ' ?> <?php  //rowspan în f-ie de nr. de lecții pe fiecare zi în parte
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $lectii)
                                    {
                                        ?>
                                            <td><?= $lectii['lectia']; ?></td>
                                            <td><?= $lectii['start_hour']; ?></td>
                                            <td><?= $lectii['end_hour']; ?></td>
                                            <td>                                    
                                                <a href="../../crud/lectie-edit.php?id_lectie=<?= $lectii['id_lectie']; ?>" class="btn btn-success btn-sm">Editează</a>
                                                <form action="../../crud/code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_lectie" value="<?=$lectii['id_lectie'];?>" class="btn btn-danger btn-sm">Șterge</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<h5> Nu au fost găsite înregistrări </h5>";
                                }
                            }
                        ?>
                    </tbody>

 </div>
</div>

</body>
</html>