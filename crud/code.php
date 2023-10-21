<?php
session_start();
require '../php/conectare.php';

if(isset($_POST['delete_lectie']))
{
    $id_lectie = mysqli_real_escape_string($conn, $_POST['delete_lectie']);

    $query = "DELETE FROM lectii WHERE id_lectie='$id_lectie' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Lecția a fost Ștearsă cu Succes!";
        header("Location: ../log_reg/php/home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Lecția nu a fost Ștearsă! :(";
        header("Location: ../log_reg/php/home.php");
        exit(0);
    }
}

if(isset($_POST['update_lectie']))
{
    $id_lectie = mysqli_real_escape_string($conn, $_POST['id_lectie']);

    $ziua = mysqli_real_escape_string($conn, $_POST['ziua']);
    $lectia = mysqli_real_escape_string($conn, $_POST['lectia']);
    $start_hour = mysqli_real_escape_string($conn, $_POST['start_hour']);
    $end_hour = mysqli_real_escape_string($conn, $_POST['end_hour']);

  //  $query = "UPDATE lectii SET ziua='$ziua', lectia='$lectia', start_hour='$start_hour', end_hour='$end_hour' WHERE id_lectie='$id_lectie' ";

    $id = $_POST['id_lectie'];

    require '../crud/verify_update_lectii.php';


    $query_run = mysqli_query($conn, $query);

    if( ($query_run) && ($end_hour>$start_hour) ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!!
    {
        $_SESSION['message'] = "Lecția a fost Actualizată cu Succes!";
        header("Location: ../log_reg/php/home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Lecția nu a fost Actualizată, oră incorectă! :(";
        header("Location: ../log_reg/php/home.php");
        exit(0);
    }

}


if(isset($_POST['save_lectie']))
{
    $ziua = mysqli_real_escape_string($conn, $_POST['ziua']);
    $lectia = mysqli_real_escape_string($conn, $_POST['lectia']);
    $start_hour = mysqli_real_escape_string($conn, $_POST['start_hour']);
    $end_hour = mysqli_real_escape_string($conn, $_POST['end_hour']);

 //   $query = "INSERT INTO lectii (ziua,lectia,start_hour,end_hour) VALUES ('$ziua','$lectia','$start_hour','$end_hour')";
    

    require '../crud/verify_lectii.php';


    $query_run = mysqli_query($conn, $query);
    if( ($query_run) && ($end_hour>$start_hour) ) //inceput: 8:00 , sfarsit: 7:30 --gresit!!!
    {
        $_SESSION['message'] = "Lecția a fost creată cu Succes!";
        header("Location: lectie-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Lecția nu a fost Creată, oră incorectă! :(";
        header("Location: lectie-create.php");
        exit(0);
    }
}

?>