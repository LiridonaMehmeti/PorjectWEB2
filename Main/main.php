<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $users = $result->fetch_assoc();

    
    $cookie_name = "user_id";
    $cookie_value = $users["id"];
    $cookie_expiration = time() + (86400 * 30); // 30 days
    setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="box">
        <img class="foto" src="/PorjectWEB2/Main/Comics.png" alt="Marvel Logo">
        <img class="hero1" src="Avengers.png" alt="hero">
        <a href="Login.php" alt="">Check now</a>
    </div>
    <div class="rightbox">
        <img class="foto1" src="/PorjectWEB2/Main/Heores.png" alt="Heroes">
        <img class="hero1" src="heroooo.jpg" alt="hero">
        <a href="Login.php" target="_blank" alt="">Check now</a>

    </div>
    <div class="leftbox">
        <img class="leftfoto" src="/PorjectWEB2/Main/Movies.png" alt="Movies">
        <img class="foto2" src="MarMov.png" alt="hero">
        <a href="Login.php" target="_blank" alt="">Check now</a>
     
    </div>
    <div class="login-box">
        <form>
            <a href="Login.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Log in
            </a>

        </form>
    </div>
</body>

</html>