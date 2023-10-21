<?php

//verificăm dacă există alte lecții în ziua și la ora lecției noi
    $sql = "SELECT  *,COUNT(*) as total FROM lectii WHERE lectii.ziua = '$ziua'
        AND (
        ('".$start_hour."' BETWEEN lectii.start_hour AND lectii.end_hour)
        OR ( '".$end_hour."' BETWEEN lectii.start_hour AND lectii.end_hour )
        )";
    $res = $conn->query($sql);
    $value = mysqli_fetch_assoc($res);
    echo $value['total'];

    if($value['total']>0) //dacă există lectie la ora respectivă, în ziua aleasă, apare eroare
    {
        $_SESSION['message'] = "Lecția nouă nu a fost Creată! Deja există lecția „".$value['lectia']."” "."la ora respectivă! "." ".":(";
        header("Location: lectie-create.php");
        exit(0);
    }
    else if ($end_hour>$start_hour)     
    {
      $query = "INSERT INTO lectii (lectii.ziua,lectia,start_hour,end_hour) VALUES ('$ziua','$lectia','$start_hour','$end_hour')";
    }

    if(  ($end_hour<=$start_hour) ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!!    
    {
        $_SESSION['message'] = "Lecția nu a fost Creată, oră incorectă! :(";
        header("Location: lectie-create.php");
        exit(0);
    }
?>