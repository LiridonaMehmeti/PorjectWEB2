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
            //session_regenerate_id();
            
            $_SESSION["user_id"] = $users["id"];
            $_SESSION['name'] = $users['name'];
            $_SESSION['lastname'] = $users['lastname'];
            $_SESSION['number'] = $users['number'];
            $_SESSION['email'] = $users['email'];
            $_SESSION['username'] = $users['username'];
            
            // Set a cookie named "user_id" with the value of the user's ID that expires in 1 day
            $cookie_name = "user_id";
            $cookie_value = $users["id"];
            $cookie_expiration = time() + (24 * 60 * 60); // 1 day
            setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");
            
            header("location: show-faq.php");
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
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
      <label for="email">Enter Username</label>
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
      <button name="login" type="submit"> Submit </button>
    </a>
  </form>
</div>

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
