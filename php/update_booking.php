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
    <link rel="stylesheet" href="../css/update_booking.css">
    <title>Modifica Prenotazione</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="./user_page.php">Prenotazioni</a></li>
            <li class="single-link"><a href="../index.php">HomePage</a></li>
        </ul>
    </nav>
    <div class="form-box">
        <input id="hotel-name-box" class="data-box" type="text" placeholder="Hotel" maxlength="30" name="hotel_name" required="true">
        <input id="number-box" class="data-box" type="number" name="people" max="10" min="1" placeholder="1"> 
        <input id="date-box" class="data-box" type="date" name="book_date" required="true">
        <div class="error-div">
            <h4 id="error-msg"></h4>
        </div>

        <button id="update-btn" type="submit">Modifica</button>
    </div>
    <script src="../js/update_booking.js"></script>
</body>
</html>