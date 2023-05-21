
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="login-box">
<form method="POST" >
          <div class="user-box">
            <input type="text" name="name" id="name" required="">
            <label for="name" >Name:</label>
          </div>
          <div class="user-box">
            <input type="email" name="email" id="email" required="">
            <label for="email">Email:</label>
          </div>
          <div class="user-box">
            <input type="text" name="lastname" id="lastname" required="">
            <label for="lastname">Last Name:</label>
          </div>
          <div class="user-box">
            <input type="password" name="current_password" id="current_password" required="">
            <label for="current_password">Password</label>
          </div>
          <button type="submit" name="update_profile">Update Profile</button>
</form>
</div>
</body>
</html>



<?php

if (empty($_POST["name"])) {
    die("Name is required");
}
if (empty($_POST["lastname"])) {
  die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["current_password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["current_password"])) {
    die("Password must contain at least one letter");
}
if (strlen($_POST["new_password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["new_password"])) {
    die("Password must contain at least one letter");
}

$hostname = 'localhost';
$username = 'root';
$password = '1250981453';
$database = 'login_db';

// Create a connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Retrieve the user's existing profile data from the database based on a user ID or username
$userId = 1; // Replace with the actual user ID
$query = "SELECT * FROM users WHERE Id = $userId"; // Modify the query based on your database structure
$result = $connection->query($query);

// Check if the query was successful and the user exists
if ($result && $result->num_rows > 0) {
    // Fetch the user data
    $user = $result->fetch_assoc();
    $name = $user['name'];
    $email = $user['email'];
    $lastname = $user['lastname'];
    $current_password = $user['current_password'];


    // Free the result set
} else {
    // Handle the case when the query fails or no user data found
    echo "Failed to retrieve user data";
    $connection->close();
    exit();
}

// Update the user's profile information in the database
$updateQuery = "UPDATE users SET name = ?, email = ? , lastname= ?, current_password= ? WHERE ID = $userId"; // Modify the query based on your database structure

$stmt = $connection->prepare($updateQuery);

if (!$stmt) {
    die("SQL error: " . $connection->error);
}

$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $_POST["lastname"],$_POST["current_password"]);

if ($stmt->execute()) {
    // Profile information updated successfully
    header("Location: Login.php");
    echo "Profile updated successfully";
} else {
    // Error occurred while updating profile information
    echo "Error updating profile: " . $connection->error;
}

// Close the connection
$connection->close();
?>

