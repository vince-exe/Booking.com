<?php
    include("php_scripts/db_conn.php");
    if(!$conn_ok) {
        header("Location: php/404.php");
        exit;
    }

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Login</title>
</head>
<body>
    <nav class="login-main-nav-bar">
        <h1>Booking.com</h1>
    </nav>
    <form class="form-box" action="index.php" method="post">
        <input class="data-box" id="email-box" type="email" autocomplete="off" placeholder="youremail@gmail.com" name="email" maxlength="60" required="true">
        <input class="data-box" id="password-box" type="password" placeholder="password" name="password" required="true">
        <h4>Non hai un account? <a href="php/registration.php">Registrati ora</a></h4> 
        <h4 id="error-msg"></h4>
        <button id="login-btn" type="submit">Log In</button>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = strtolower($_POST["email"]);
        
        $sql_query = "SELECT id, first_name, last_name, email, password, reg_date FROM user WHERE email = '$email';";
        $result = mysqli_query($conn, $sql_query);

        /* no accounts with that email */
        if(mysqli_num_rows($result) == 0) {
            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").style.color = "red";
                    document.getElementById("error-msg").innerHTML = "Nessun account associato a questa email";
                </script>
            ';
            exit;
        }
        $row = mysqli_fetch_assoc($result); 
        /* check if the password corrispond at the email */
        if(!password_verify($_POST["password"], $row["password"])) {
            echo '
                <script type="text/JavaScript"> 
                    document.getElementById("error-msg").style.display = "block";
                    document.getElementById("error-msg").style.color = "red";
                    document.getElementById("error-msg").innerHTML = "Email o password errati";
                </script>
            ';
            exit;
        }

        $sql_query_admin = "SELECT id FROM admin WHERE userId = '$row[id]';";
        $result_admin = mysqli_query($conn, $sql_query_admin);
        
        $_SESSION["first_name"] = $row["first_name"];
        $_SESSION["logged"] = true;
        $_SESSION["userId"] = $row["id"];

        /* it's a normal user */
        if(mysqli_fetch_row($result_admin) == 0) {
            $_SESSION["status"] = "user";
            header("Location: php/user_page.php");
        }
        /* admin */
        else {
            $_SESSION["status"] = "admin";
            echo "<br>ADMIN PAGE";
        }
    }
?>