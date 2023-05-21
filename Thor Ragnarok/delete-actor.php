<?php
    session_start();
    include "../Main/database.php";
    $newId = $_GET["newid"];
    
    if(isset($_POST["delete1"])){
        $sql = "DELETE FROM actors_ragnarok WHERE id= '$newId'";
        mysqli_query($mysqli,$sql);
        header("Location: ../Thor Ragnarok/thor.php");
        exit;
    }

?>