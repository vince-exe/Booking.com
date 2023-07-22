<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        include("./db_conn.php");
        if(!$conn_ok) {
            $response = array("status" => "false", "message" => "errore durante la connessione con il database.");
            echo json_encode($response);
            exit;
        }
        
        $_POST = json_decode(file_get_contents('php://input'), true);

        $sql_query = "DELETE FROM booking WHERE booking.id = '$_POST[hotel_id]';";
        $response = null;

        if(mysqli_query($conn, $sql_query)) {
            $response = array("status" => "true");
        }
        else {
            $response = array("status" => "false", "message" => "fail");
        }
        echo json_encode($response);
    }
?>