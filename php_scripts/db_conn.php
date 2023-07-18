<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "hotel";
    $conn;
    $conn_ok = false;

    try {
        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        $conn_ok = true;
    }
    catch(mysqli_sql_exception) {
        $conn_ok = false;
    }
    if(!$conn) {    
        $conn_ok = false;
    }
?>