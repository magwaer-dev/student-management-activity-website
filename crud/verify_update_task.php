<?php
//verificăm dacă există lecții în ziua și la ora task-ul curent
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
        $_SESSION['message'] = "Task-ul se suprapune cu lecția „".$value['lectia']."” "." din"." ".$zile[$i]." și nu a fost editat! "." "." Încearcă să schimbi ora :(";
        header("Location: task-edit.php?id_task=".$id);
        exit(0);
    }

//verificăm dacă există alte task-uri în ziua și la ora task-ul curent
    $sql = "SELECT  *,COUNT(*) as total FROM tasks WHERE tasks.date = '$date'
        AND (
        ('".$start_event."' BETWEEN tasks.start_event AND tasks.end_event)
        OR ( '".$end_event."' BETWEEN tasks.start_event AND tasks.end_event )
        )
        AND (
        '".$id_task."'!=tasks.id_task)";
    $res = $conn->query($sql);
    $value = mysqli_fetch_assoc($res);
    echo $value['total'];

    if($value['total']>0) //dacă există task-uri la ora respectivă, în ziua aleasă, apare eroare
    {
        $_SESSION['message'] = "Task-ul curent nu a fost Editat! Deja există task-ul „".$value['title']."” "."la ora respectivă! "." ".":(";
        header("Location: task-create.php");
        exit(0);
    }
    else if (($end_event>$start_event) && ($date>'2000-01-01'))    
    {
      $query = "UPDATE tasks SET tasks.date='$date', title='$title', start_event='$start_event', end_event='$end_event' WHERE id_task='$id_task' ";
    }

    if( ($end_event<=$start_event) || ($date<'2000-01-01') ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!! Și data trebuie setată.
    {
        $_SESSION['message'] = "Task-ul nu a fost Editat, date incorecte! :(";
        header("Location: ../log_reg/php/tasks.php");
        exit(0);
    }

?>