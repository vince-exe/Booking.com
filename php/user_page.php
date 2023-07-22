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
    <link rel="stylesheet" href="../css/homepage.css">
    <title>HomePage</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="../php_scripts/logout.php">Logout</a></li>
            <li class="single-link"><a href="./about_me.php">About Me</a></li>
        </ul>
    </nav>
    <div class="welcome-div">
        <h1>Benvenuto <?php  echo $_SESSION["first_name"]?></h1>
        <h3>Grazie per aver scelto il nostro sito, che aspetti? Prenota il tuo hotel!</h3>
    </div> 
    <div class="buttons-div">
        <a href="./booking.php"><button id="bookBtn" class="button">Prenota</button></a>
        <a href="./view_bookings.php"><button id="bookingsBtn" class="button">Prenotazioni</button></a>
    </div> 
</body>
</html>