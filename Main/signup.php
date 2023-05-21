<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Login Page</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='signup.css'>
  <script src='main.js'></script>
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <script src="/js/validation.js" defer></script>
</head>

<body>

  <div class="signup-box">
    <h2>SIGN UP</h2>

    <div class="user-box">
      <form action="signup.php" method="post" id="signup" novalidate>
        <input type="text" name="name" placeholder=" " required>
        <label for="name">First name</label>
    </div>
    <div class="user-box">
      <input type="text" name="lastname" placeholder=" " required>
      <label for="lastname">Last name</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" placeholder="" required>
      <label for="email">Email</label>
    </div>
    <div class="user-box">
      <input type="email" name="confirmEmail" placeholder="" required>
      <label for="email">Confirm your Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" placeholder="" required>
      <label for="password">Password</label>
    </div>
    <div class="user-box">
      <input type="password" name="confirmPassword" placeholder="" required>
      <label for="password">Confirm your Password</label>
    </div>

    <a>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button type="submit" name="signup">Sign Up</button> </a>
    </form>
  </div>

  <?php

  if (empty($_POST["name"])) {
    die("Name is required");
  }
  if (empty($_POST["lastname"])) {
    die("Name is required");
  }

  if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
  }

  if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
  }

  if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
  }

  if ($_POST["email"] === $_POST["confirmEmail"] && $_POST["password"]=== $_POST["confirmPassword"]) {
    
  
  $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $mysqli = require __DIR__ . "/database.php";

  $sql = "INSERT INTO users (name, lastname, email, password_hash)
        VALUES (?, ?, ?,?)";

  $stmt = $mysqli->stmt_init();

  if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
  }

  $stmt->bind_param(
    "ssss",
    $_POST["name"],
    $_POST["lastname"],
    $_POST["email"],
    $password_hash
  );

  if ($stmt->execute()) {

    header("Location: Login.php");
    exit;
  } else {

    if ($mysqli->errno === 1062) {
      die("email already taken");
    } else {
      die($mysqli->error . " " . $mysqli->errno);
    }
  }

  // Check if the signup form was submitted
  if (isset($_POST['signup'])) {
    // Perform form validation and database insertion here

    // If the signup is successful, set a cookie
    if ($stmt->execute()) {
      // Set a cookie named "signup_success" with the value "1" that expires in 1 week

      $cookie_name = "signup_success";
      $cookie_value = "1";
      $expiry_time = time() + (7 * 24 * 60 * 60); // 1 week from now

      // Set the cookie
      setcookie($cookie_name, $cookie_value, $expiry_time, '/'); // '/' makes the cookie available on the entire domain

      header("Location: Login.php");
      exit;
    } else {
      if ($mysqli->errno === 1062) {
        die("email already taken");
      } else {
        die($mysqli->error . " " . $mysqli->errno);
      }
    }
  }
  }else{
    echo "Credintail dont match";
  }

  ?>