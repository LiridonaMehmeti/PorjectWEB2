<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='signup.css'>
    <script src='main.js'></script>
</head>
<body>
    
    <div class="signup-box">
        <h2>SIGN UP</h2>
        <form>
          <div class="user-box">
          <input type="text" name="name" placeholder="Name" required>
            <label>First name</label>
          </div>
          <div class="user-box">
          <input type="text" name="lastname" placeholder="Last name" required>
            <label>Last name</label>
          </div>
          <div class="user-box">
          <input type="email" name="email" placeholder="Email" required>
            <label>Email</label>
          </div>
          <div class="user-box">
          <input type="password" name="password" placeholder="Password" required>
            <label>Password</label>
          </div>
          <div class="user-box">
          <input type="password" name="password" placeholder="Confirm password" required>
            <label>Confirm password</label>
          </div>
          
  <a href="Login.php">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Sign Up
          </a>
</form>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = $_POST["Name"];
  $lastname = $_POST["Last Name"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];
  $password = $_POST["Cofirm password"];
  

  // Validate the form data (you can add more validation as per your requirements)
  if (empty($name) || empty($lastname)|| empty($email) || empty($password)|| empty($password)) {
    echo "Please fill in all the fields.";
    header("Location: Login.php");
    exit();
  } else {
    // Perform further processing (e.g., database insertion, user creation, etc.)
    // ...

    // Display a success message
    echo "Sign up successful!";
  }
}
?>

