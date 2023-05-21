<?php

// connect database
$conn = new PDO("mysql:host=localhost:3333;dbname=login_db", "root", "");

// check if FAQ existed
$sql = "SELECT * FROM movies WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->execute([
    $_REQUEST["id"],
]);
$movie = $statement->fetch();

if (!$movie) {
    die("Movie not found");
}

// delete from database
$sql = "DELETE FROM movies WHERE id = ?";
$statement = $conn->prepare($sql);
$statement->execute([
    $_POST["id"],
]);

// redirect to previous page
header("Location: " . $_SERVER["HTTP_REFERER"]);
