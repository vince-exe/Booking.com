<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Registration</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
        <ul class="link-div">
            <li class="single-link"><a href="../index.php">Login</a></li>
        </ul>
    </nav>
    <form class="form-box" action="registration.php" method="post">
        <input class="data-box" id="firstname-box" type="text" autocomplete="off" placeholder="first name" name="first_name" maxlength="20" required="true">
        <input class="data-box" id="lastname-box" type="text" autocomplete="off" placeholder="last name" name="last_name" maxlength="20" required="true">
        <input class="data-box" id="email-box" type="email" autocomplete="off" placeholder="youremail@gmail.com" name="email" maxlength="60" required="true">
        <input class="data-box" id="password-box" type="password" placeholder="password" name="password" required="true">
        <h4 id="error-msg"></h4>
        <button id="registration-btn" type="submit">Registrati</button>
    </form>
</body>
</html>

<?php
    include("../php_scripts/db_conn.php");
    if(!$conn_ok) {
        header("Location: 404.php");
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = strtolower($_POST["first_name"]);
        $last_name = strtolower($_POST["last_name"]);
        $email = strtolower($_POST["email"]); 
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql_query = "INSERT INTO user (first_name, last_name, email, password) 
                      VALUES ('$first_name', '$last_name', '$email', '$hashed_password');";

        try {
            mysqli_query($conn, $sql_query);

            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").style.color = "green";
                    document.getElementById("error-msg").innerHTML = "Registrazione effettuata! Vai al login";
                </script>
            ';
        }
        catch(mysqli_sql_exception) {
            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").innerHTML = "Esiste già un account con questa email";
                </script>
            ';
        }
    }
?>  