<?php
session_start();
// Assuming you have a database connection established
include "../Main/database.php";
if (isset($_POST['password'])) {
    // Retrieve the form data
    $currentPassword = $_POST['curr_password'];
    $newPassword = $_POST['new_password'];
    $verifyPassword = $_POST['verify_password'];

    // Perform necessary validations
    if ($newPassword !== $verifyPassword) {
        $error = "Passwords do not match";
        header("Location: change.php?error=" . urlencode($error));
        exit;
    }

    // Validate the current password against the one in the database
    // Retrieve the user's current password from the database based on their ID or username
    if(!empty($_SESSION)){ 

        $id = $_SESSION['user_id'];
        $mysqli = require "../Main/database.php";
        $query = "SELECT password_hash FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_fetch_all($result);
        $currentPasswordfromDB = $result2[0][0];
      // Replace with your database query to retrieve the current password
    // Example query: $currentPasswordFromDB = "SELECT password FROM users WHERE id = :userId";
    // Bind the user ID parameter and execute the query

    // Verify the current password
    if (!password_verify($currentPassword, $currentPasswordfromDB)) {
        $error = "Invalid current password";
        header("Location: change.php?error=" . urlencode($error));
        exit;
    }


    // Generate a password hash for the new password
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    // Execute the update query to update the user's password based on their ID or username
    // Example query: $updateQuery = "UPDATE users SET password = :newPassword WHERE id = :userId";
    // Bind the new password parameter and user ID parameter, then execute the query

    // Redirect to a success page or any other desired location
    header("Location: Login.php");
    exit;
}
}
?>
