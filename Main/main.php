<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $users = $result->fetch_assoc();
}

?>

<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $users = $result->fetch_assoc();

    // Set a cookie with user information
    $cookie_name = "user_info";
    $cookie_value = json_encode($users);
    $expiry_time = time() + (24 * 60 * 60); // 1 day from now

    // Set the cookie
    setcookie($cookie_name, $cookie_value, $expiry_time, '/');
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
    <!-- Your HTML content here -->
</body>

</html>

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
