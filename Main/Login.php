<?php session_start();
include_once 'config.php';
// Code for login
if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $dec_password = $password;
    $useremail = $_POST['email'];
    $ret = mysqli_query($db, "SELECT ID,name FROM users WHERE email='$useremail' and password_hash='$dec_password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['user_id'] = $num['ID'];
        $_SESSION['name'] = $num['name'];
        header("location:show-faq.php");

    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
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
