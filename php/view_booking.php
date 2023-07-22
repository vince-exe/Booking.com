<?php
    session_start();

    if(!$_SESSION["logged"]) {
        header("Location: ../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/view_booking.css">
    <title>View Book</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="./view_bookings.php">Prenotazioni</a></li>
            <li class="single-link"><a href="../php_scripts/logout.php">Logout</a></li>
            <li class="single-link"><a href="./about_me.php">About Me</a></li>
        </ul>
    </nav>
    <div class="form-box">
        <input id="hotel-name-box" class="data-box" type="text" readonly>
        <input id="number-box" class="data-box" type="number" readonly> 
        <input id="date-box" class="data-box" type="text" readonly>
        <a href="./view_bookings.php"><button id="back-btn">Indietro</button></a>
    </div>
    <script src="../js/view_booking.js"></script>
</body>
</html>