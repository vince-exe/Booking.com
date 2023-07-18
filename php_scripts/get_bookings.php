<?php
    include("db_conn.php");
    if (!$conn_ok) {
        $response = array("status" => "fail");
        echo json_encode($response);
        exit;
    }  
    session_start();

    $query = "SELECT booking.id,
                   booking.hotel_name
            FROM booking INNER JOIN user ON user.id = booking.userId WHERE user.id = '$_SESSION[userId]';";

    $result = mysqli_query($conn, $query);
    /* empty */
    if (mysqli_num_rows($result) <= 0) {
        $response = array(
            "status" => "empty",
            "data" => []
        );
        echo json_encode($response);
        exit;
    }
    $array = array();

    while($row = mysqli_fetch_assoc($result)) {
        array_push($array, ["id" => $row["id"], "name" => $row["hotel_name"]]);
    }

    $response = array("status" => "ok","data" => $array);
    echo json_encode($response);
?>