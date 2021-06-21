<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql_crud'
);

//if para ver si la base de datos esta conectada. isset comprueba que una variable haya sido declarada.

/* if (isset($conn)){
    echo'DB is connected';
}*/

?>