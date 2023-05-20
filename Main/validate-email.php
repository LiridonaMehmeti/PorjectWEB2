<?php

$mysqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM users
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));
                
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);


$mysqli = require __DIR__ . "/database.php";

$sql = sprintf("SELECT * FROM users
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));

$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

// Set a cookie to remember the availability status
$cookie_name = "email_availability";
$cookie_value = $is_available ? "available" : "unavailable";
$expiry_time = time() + (24 * 60 * 60); // 1 day from now

// Set the cookie
setcookie($cookie_name, $cookie_value, $expiry_time, '/'); // '/' makes the cookie available on the entire domain

// Send JSON response
header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);

?>
