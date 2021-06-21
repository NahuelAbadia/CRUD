<?php

include("db.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')"; //Inserto los valores de title y description en la tabla Task de mi BDD
    $result = mysqli_query($conn, $query); //Realizo una consulta SQL y lo guardo en la variable $result.
    if (!$result){ //Si hice mal la consulta o no anda me va a tirar el mensaje de QUERY FAILED.
        die("QUERY FAILED");
    //Si esta todo bien no muestra nada y hace lo de la linea de abajo.
    }
    $_SESSION['message'] = 'Tarea guardada';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php"); //Al realizar la consulta me redirecciona al index.php, o sea la pagina principal
}

?>