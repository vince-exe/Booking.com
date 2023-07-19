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
    <link rel="stylesheet" href="../css/booking.css">
    <title>Book</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="./user_page.php">HomePage</a></li>
        </ul>
    </nav>
    <form class="form-box" action="booking.php" method="post">
        <input id="hotel-name-box" class="data-box" type="text" placeholder="Hotel" maxlength="30" name="hotel_name" required="true">
        <input id="number-box" class="data-box" type="number" name="people" max="10" min="1" placeholder="1"> 
        <input id="date-box" class="data-box" type="date" name="book_date" required="true">
        <div class="error-div">
            <h4 id="error-msg"></h4>
        </div>
        

        <button id="book-btn" type="submit">Prenota</button>
    </form>
</body>
</html>
<script>
        let dateObj = new Date();
        let currYear = dateObj.getFullYear(); 
        var dateBox = document.getElementById('date-box');

        dateBox.min = currYear + "-01-01";
        dateBox.max = (currYear + 100) + "-12-31";

        document.getElementById('date-box').value = new Date().toDateInputValue();

        var button = document.getElementById("book-btn");
        var hotelNameBox = document.getElementById("hotel-name-box");
        var numberBox = document.getElementById("number-box");

        button.addEventListener("click", function() {
            hotelNameBox.placeholder = "Hotel";
            numberBox.placeholder = "1";
            dateBox.placeholder = "gg / mm / aaaa";
        }); 
</script>
<?php
    include("../php_scripts/db_conn.php");
    if(!$conn_ok) {
        header("Location: 404.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $sql_query = "INSERT INTO booking (userId, hotel_name, people, book_date)
        VALUES ('$_SESSION[userId]', '$_POST[hotel_name]', '$_POST[people]', '$_POST[book_date]');";
        
        try {
            mysqli_query($conn, $sql_query);
            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").style.color = "green";
                    document.getElementById("error-msg").innerHTML = "Prenotazione effettuata con successo!! <br><br> Vai alla HomePage per visualizzare le tue prenotazioni";
                </script>
            ';
        }
        catch(mysqli_sql_exception) {
            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").innerHTML = "Impossibile effettuare la prenotazione";
                </script>
            ';
        }
    }
?>