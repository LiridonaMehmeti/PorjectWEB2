
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
<input type="hidden" name="userID" value="123">
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
            <input type="password" name="password" id="password" required="">
            <label for="password">Password</label>
          </div>
          <button type="submit" name="update_profile">Update Profile</button>
</form>
</div>
</body>
</html>



<?php
if(isset($_POST['update_profile'])) 
    // Database connection configuration
    $hostname = 'localhost';  // Replace with your database hostname
    $username = 'root';  // Replace with your database username
    $password = '1250981453';  // Replace with your database password
    $database = 'login_db';  // Replace with your database name

    // Create a connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming you have already established a database connection
    
    // Check if the form is submitted
    if (isset($_POST['update_profile'])) {
        // Retrieve form data
        $userID = mysqli_real_escape_string($conn, $_POST['userID']);
       //$name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
       // $password = mysqli_real_escape_string($conn, $_POST['password']);
      
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the user profile in the database
        $query = "UPDATE users SET  email='$email', lastname='$lastname', password_hash='$hashedPassword' WHERE ID='$userID'";
        if (mysqli_query($conn, $query)) {
            echo "Profile updated successfully.";
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
        }
    }
    ?>
    




