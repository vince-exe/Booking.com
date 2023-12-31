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
    <link rel="stylesheet" href="../css/view_bookings.css">
    <title>Bookings</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="../php_scripts/logout.php">Logout</a></li>
            <li class="single-link"><a href="./about_me.php">About Me</a></li>
            <li class="single-link"><a href="./user_page.php">Prenota</a></li>
        </ul>
    </nav>
    <table id="bookings-table">
        <tr>
            <th>Prenotazioni</th>
        </tr>
    </table>
    <div id="banner" class="banner">
        <p class="first-p-banner">Sei sicuro di voler eliminare la prenotazione?</p>
        <div class="buttons-div-banner">
            <button id="confirmButton" class="banner-button">Conferma</button>
            <button id="cancelButton" class="banner-button">Annulla</button>
        </div>
    </div>
    <script src="../js/view_bookings.js"></script>
</body>
</html>