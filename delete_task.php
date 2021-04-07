<?php
    include('./db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        
        if(!$result){
            die('SQL FAIL');
        }

        $_SESSION['message'] = "Task removed successfuly";
        $_SESSION['message_type'] = 'alert-danger';
        header("Location: index.php");

    }
?>