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
            <li class="single-link"><a href="../index.html">Logout</a></li>
            <li class="single-link"><a href="../index.html">About Me</a></li>
            <li class="single-link"><a href="./user_page.php">Prenota</a></li>
        </ul>
    </nav>
    <table>
        <tr>
            <th>Prenotazioni</th>
        </tr>
        <tr>
            <td class="td-text">Elemento 1</td>
            <td class="actions">
            <div class="dropdown">
                <div class="dots">...</div>
                <div class="dropdown-content">
                <a href="#">Modifica</a>
                <a href="#">Rimuovi</a>
                </div>
            </div>
            </td>
        </tr>
        <tr>
            <td class="td-text">Elemento 2</td>
            <td class="actions">
            <div class="dropdown">
                <div class="dots">...</div>
                <div class="dropdown-content">
                <a href="#">Modifica</a>
                <a href="#">Rimuovi</a>
                </div>
            </div>
            </td>
        </tr>
    </table>
    <script src="../js/view_bookings.js"></script>
</body>
</html>