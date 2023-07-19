<?php
    include("../php_scripts/db_conn.php");
    if(!$conn_ok) {
        $response = array("status" => "false", "message" => "errore durante la connessione con il database.");
        echo json_encode($response);
        exit;
    }
    if(!isset($_COOKIE["hotelId"])) {
        $response = array("status" => "false", "message" => "Selezionare una prenotazione valida.");
        echo json_encode($response);
        exit;
    }

    session_start();

    $sql_query = "SELECT hotel_name, people, book_date FROM booking INNER JOIN user ON user.id = booking.userId WHERE booking.id = '$_COOKIE[hotelId]';";
    $result = mysqli_query($conn, $sql_query);

    $array = array();
    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, ["hotel_name" => $row["hotel_name"], "people" => $row["people"], "book_date" => $row["book_date"]]);
    }

    echo json_encode(array("status" => "true", "array" => $array));
?>