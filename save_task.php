<?php 

include('db.php');

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        die("Fail in the sistem");
    }

    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'alert-success';

    //si todo sale bien redireccionaremos al usuario al index php
    header("Location: index.php");
}


?>