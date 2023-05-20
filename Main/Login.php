<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $users = $result->fetch_assoc();
    
    if ($users) {
        
        if (password_verify($_POST["password"], $users["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $users["id"];
            
            header("Location: main.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

session_start();

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $users = $result->fetch_assoc();

    // Set the session value for user information
    $_SESSION["user_info"] = $users;
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


<!-- Display the login form again if authentication fails -->
<div class="login-box">
        <h2>Login to you Account</h2>
        <form method="post">
          <div class="user-box">
          <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <label for="email" >Enter Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label for="password">Enter Password</label>
          </div>
          <a href="../Main/Forgot Password/forgotpass.php" class="forgot-password">Forgot Password?</a>
          <a href="../Main/signup.php" class="forgot-password">Don't have an account?</a><br>
          <a>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <button> Submit </button>
          </a>
        </form>
      </div>

<?php
// Display error message if any
if (isset($error)) {
    echo "<p>Keni dhene informata te gabuara</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <script src='main.js'></script>
</head>
<body>
    
    
</body>
</html>
