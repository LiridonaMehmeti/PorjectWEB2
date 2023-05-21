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
</div>
            
        <img src="img/profile.png" class="user-pic" onclick="toggleMenu()">
		 <div class="sub-menu-wrap" id="subMenu" >
			<div class="sub-menu" >
				<div class="user-info" >
					<img src="img/profile.png" >
					<h1>User</h1>
				</div>
				<hr>
		
				<a href="/PorjectWEB2/Comics/profile.php" class="sub-menu-link" >
					<img src="img/profile.png">
					<p>Edit Profile</p>
					<span></span>
				</a>
				
				<a href="/PorjectWEB2/Comics/aboutus.php" class="sub-menu-link" >
					<img src="img/help.png">
					<p>About Us</p>
					<span></span>
				</a>
					<a href="/PorjectWEB2/Main/Login.php" class="sub-menu-link" >
					<img src="img/logout.png">
					<p>Log Out</p>
					<span></span>
				</a>
            </div>
    

        </form>
        
    </div>
    <script src="main.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>