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

      <?php
       session_start();

// Step 2: Validate user input
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $username = $_POST["username"];
         $password = $_POST["password"];

    // Step 3: Authenticate user
    // Perform database query or other authentication mechanism
    // Compare the provided username and password with the stored credentials

       if ($username == "filanfisteku" && $password == "filan123") {
        // Step 4: Start a session
        $_SESSION["username"] = $username;

        // Step 5: Redirect to the main page or authenticated area
        header("Location: main.php");
        exit();
    } else {
        // Display error message if authentication fails
        $error = "Invalid username or password";
    }
}
?>

<!-- Display the login form again if authentication fails -->
<div class="login-box">
        <h2>Login to you Account</h2>
        <form>
          <div class="user-box">
            <input type="text" name="username" required="">
            <label>Enter Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
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

<?php
// Display error message if any
if (isset($error)) {
    echo "<p>Keni dhene informata te gabuara</p>";
}
?>

</body>
</html>
