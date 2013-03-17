<?php
    require_once './classes/database/MySqlDatabase.php';
    
    $database = new MySqlDatabase();
    
    $database->connect();
    $database->createUser($_GET["firstname"], $_GET["lastname"], $_GET["email"], $_GET["password"], $_GET["isAdmin"]);        
    $database->close();
?>
