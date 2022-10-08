<?php
//verificăm dacă există lecții în ziua și la ora task-ul nou
    $zile=array("Luni", "Marți", "Miercuri", "Joi", "Vineri", "Sâmbătă", "Duminică");
    $days=array("Mon", "Tue", "Wen", "Thu", "Fri", "Sat", "Sun");
    $timestamp = strtotime($date);
    $day = date('D', $timestamp); // din 08-10-2022 transformă în Sat, adică sâmbătă
    $i= array_search($day, $days); //returnează index-ul lui Sat din array-ul $days
    $sql = "SELECT  *,COUNT(*) as total FROM lectii WHERE ziua = '$zile[$i]'
        AND (
        ('".$start_event."' BETWEEN lectii.start_hour AND lectii.end_hour)
        OR ( '".$end_event."' BETWEEN lectii.start_hour AND lectii.end_hour )
        )";
    $res = $conn->query($sql);
    $value = mysqli_fetch_assoc($res);
    echo $value['total'];

    if($value['total']>0) //dacă există lecții la ora respectivă, în ziua aleasă, apare eroare
    {
        $_SESSION['message'] = "Task-ul se suprapune cu lecția „".$value['lectia']."” "." din"." ".$zile[$i]." și nu a fost creat! "." "." Încearcă să schimbi ora :(";
        header("Location: task-create.php");
        exit(0);
    }

//verificăm dacă există alte task-uri în ziua și la ora task-ul nou
    $sql = "SELECT  *,COUNT(*) as total FROM tasks WHERE tasks.date = '$date'
        AND (
        ('".$start_event."' BETWEEN tasks.start_event AND tasks.end_event)
        OR ( '".$end_event."' BETWEEN tasks.start_event AND tasks.end_event )
        )";
    $res = $conn->query($sql);
    $value = mysqli_fetch_assoc($res);
    echo $value['total'];

    if($value['total']>0) //dacă există task-uri la ora respectivă, în ziua aleasă, apare eroare
    {
        $_SESSION['message'] = "Task-ul nou nu a fost Creat! Deja există task-ul „".$value['title']."” "."la ora respectivă! "." ".":(";
        header("Location: task-create.php");
        exit(0);
    }
    else if (($end_event>$start_event) && ($date>'2000-01-01'))    
    {
      $query = "INSERT INTO tasks (tasks.date,title,start_event,end_event) VALUES ('$date','$title','$start_event','$end_event')";
    }
?>