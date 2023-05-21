<?php
// Retrieve the stock ID from the AJAX request

$stockId = $_POST['stockId'];

// Connect to your database (replace with your database credentials)
$dbHost = 'localhost:3333';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'login_db';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Execute a query to update the stock or remove the record from the database
$query = "UPDATE movies SET stock = stock - 1 WHERE id = '$stockId'";
// or
// $query = "DELETE FROM stocks WHERE id = '$stockId'";

$result = mysqli_query($conn, $query);

$result2 = mysqli_query($conn, "SELECT stock FROM movies where id = '$stockId'");
echo (mysqli_fetch_all($result2)[0][0]);
$test = mysqli_fetch_all($result2);
// $test = (int)strip_tags($test);
$test2 = isset($test[0][0]) ? $test[0][0] : '';
if ($result) {
  echo $test2; // Return a success message
} else {
  echo "Error updating stock: " . mysqli_error($conn); // Return an error message
}

// Close the database connection
mysqli_close($conn);
?>