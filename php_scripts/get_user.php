<?php
    include("./db_conn.php");
    if(!$conn_ok) {
        $response = array("status" => "false", "message" => "errore durante la connessione con il database.");
        echo json_encode($response);
        exit;
    }
    session_start();

    $sql_query = "SELECT first_name, last_name, email FROM user WHERE user.id = '$_SESSION[userId]'; ";
    $result = mysqli_query($conn, $sql_query);

    $array = array();
    $row = mysqli_fetch_assoc($result);
        
    array_push($array, ["status" => "true", "first_name" => $row["first_name"], "last_name" => $row["last_name"], "email" => $row["email"]]);
    echo json_encode($array);
?>