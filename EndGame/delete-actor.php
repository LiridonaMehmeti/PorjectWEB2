<?php
    session_start();
    include "../Main/database.php";
    $newId = $_GET["newid"];
    
    if(isset($_POST["delete1"])){
        $sql = "DELETE FROM actors_endgame WHERE id= '$newId'";
        mysqli_query($mysqli,$sql);
        header("Location: ../Endgame/Endgame");
        exit;
    }

?>