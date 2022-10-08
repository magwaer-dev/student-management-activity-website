<?php
session_start();
require '../php/conectare.php';

if(isset($_POST['delete_task']))
{
    $id_task = mysqli_real_escape_string($conn, $_POST['delete_task']);
    $query = "DELETE FROM tasks WHERE id_task='$id_task' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Task-ul a fost Șters cu Succes!";
        header("Location: ../php/tasks.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task-ul nu a fost Șters! :(";
        header("Location: ../php/tasks.php");
        exit(0);
    }
}

if(isset($_POST['update_task']))
{
    $id_task = mysqli_real_escape_string($conn, $_POST['id_task']);

    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $start_event = mysqli_real_escape_string($conn, $_POST['start_event']);
    $end_event = mysqli_real_escape_string($conn, $_POST['end_event']);

    $query = "UPDATE tasks SET tasks.date='$date', title='$title', start_event='$start_event', end_event='$end_event' WHERE id_task='$id_task' ";
    $query_run = mysqli_query($conn, $query);

    if( ($query_run) && ($end_event>$start_event) && ($date>'2000-01-01') ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!! Și data trebuie setată.
    {
        $_SESSION['message'] = "Task-ul a fost Actualizat cu Succes!";
        header("Location: ../php/tasks.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task-ul nu a fost Actualizat, date incorecte! :(";
        header("Location: ../php/tasks.php");
        exit(0);
    }

}


if(isset($_POST['save_task']))
{
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $start_event = mysqli_real_escape_string($conn, $_POST['start_event']);
    $end_event = mysqli_real_escape_string($conn, $_POST['end_event']);

    require '../crud/verify.php';

//inscriem task-ul nou
    

    $query_run = mysqli_query($conn, $query);
    if ($query_run) //inceput: 8:00 , sfarsit: 7:30 --gresit!!!
    {
        $_SESSION['message'] = "Task-ul a fost creat cu Succes!";
          
        header("Location: task-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Task-ul nu a fost Creat, date incorecte! :(";
        header("Location: task-create.php");
        exit(0);
    }
}

?>