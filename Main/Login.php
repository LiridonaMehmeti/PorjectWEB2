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
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $users["id"];
            
            header("Location: main.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

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
    
    <div class="login-box">
        <h2>Login to you Account</h2>
        <form>
          <div class="user-box">
            <input type="text" name="" required="">
            <label>Enter Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="" required="">
            <label>Enter Password</label>
          </div>
          <a href="main.php">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </a>
        </form>
      </div>
</body>
</html>
