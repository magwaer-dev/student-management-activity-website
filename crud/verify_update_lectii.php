<?php
//verificăm dacă există alte lectii în ziua și la ora lecția curentă
    $sql = "SELECT  *,COUNT(*) as total FROM lectii WHERE lectii.ziua = '$ziua'
        AND (
        ('".$start_hour."' BETWEEN lectii.start_hour AND lectii.end_hour)
        OR ( '".$end_hour."' BETWEEN lectii.start_hour AND lectii.end_hour )
        )
        AND (
        '".$id_lectie."'!=lectii.id_lectie)";
    $res = $conn->query($sql);
    $value = mysqli_fetch_assoc($res);
    echo $value['total'];

    if($value['total']>0) //dacă există lectii la ora respectivă, în ziua aleasă, apare eroare
    {
        $_SESSION['message'] = "Lecția curentă nu a fost Editată! Deja există lecția „".$value['lectia']."” "."la ora respectivă! "." ".":(";
        header("Location: task-edit.php?id_task=".$id);
        exit(0);
    }
    else if ($end_hour>$start_hour)     
    {
      $query = "UPDATE lectii SET lectii.ziua='$ziua', lectia='$lectia', start_hour='$start_hour', end_hour='$end_hour' WHERE id_lectie='$id_lectie' ";
    }


    if(  ($end_hour<=$start_hour) ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!!    
    {
        $_SESSION['message'] = "Lecția nu a fost Editată, oră incorectă! :(";
        header("Location: lectie-create.php");
        exit(0);
    }
?>