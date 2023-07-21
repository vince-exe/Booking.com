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
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_POST = json_decode(file_get_contents('php://input'), true);

        if (isset($_POST["hotel_name"]) && isset($_POST["people"]) && isset($_POST["book_date"])) {
            $sql_query = "UPDATE booking SET hotel_name = '$_POST[hotel_name]', people = '$_POST[people]', book_date = '$_POST[book_date]' WHERE id = $_COOKIE[hotelId];";

            try {
                mysqli_query($conn, $sql_query);
                $response = array("status" => "true");
            }
            catch(mysqli_sql_exception) {
                $response = array("status" => "false", "message" => "");
            }
            finally {
                echo json_encode($response);
            }
        }
        else {
            $response = array("status" => "false", "message" => "Dati mancanti nella richiesta POST");
            echo json_encode($response);
        }
    }
    
?>