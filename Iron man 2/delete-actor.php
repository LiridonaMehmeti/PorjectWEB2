<?php
    session_start();
    include "../Main/database.php";
    $newId = $_GET["newid"];
    
    if(isset($_POST["delete1"])){
        $sql = "DELETE FROM actors_ironman2 WHERE id= '$newId'";
        mysqli_query($mysqli,$sql);
        header("Location: ../Iron Man 2/IronMan2.php");
        exit;
    }

?>