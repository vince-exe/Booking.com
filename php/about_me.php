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
    <link rel="stylesheet" href="../css/about_me.css">
    <title>About Me</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="./user_page.php">Prenotazioni</a></li>
        </ul>
    </nav>
    <div class="form-box">
        <input class="data-box" id="firstname-box" type="text" readonly>
        <input class="data-box" id="lastname-box" type="text" readonly>
        <input class="data-box" id="email-box" type="email" readonly>
    </div>
    <script src="../js/about_me.js"></script>
</body>
</html>