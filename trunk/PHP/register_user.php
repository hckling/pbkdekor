<?php
    require_once './classes/database/MySqlDatabase.php';
    
    if (isset($_GET["isAdmin"]))
        $isAdmin = 1;
    else
        $isAdmin = 0;
    
    $database = new MySqlDatabase();
   
    $database->open();
    $database->createUser($_GET["firstname"], $_GET["lastname"], $_GET["email"], $_GET["password"], $isAdmin);        
    $database->close();
?>