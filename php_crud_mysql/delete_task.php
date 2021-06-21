<?php

    include("db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query); //Misma estructura que se utiliza en save_task.php
        if(!$result){
            die("QUERY FAILED");
        }

        $_SESSION['message'] = 'Tarea eliminada';
        $_SESSION['message_type'] = 'danger';
        
        header("Location: index.php");
    }

?>