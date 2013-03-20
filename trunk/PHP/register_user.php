<?php
    require_once '../classes/database/MySqlDatabase.php';
    
    if (isset($_GET["isAdmin"]))
        $isAdmin = 1;
    else
        $isAdmin = 0;
    
    $user = new User(-1, $_GET["firstname"], $_GET["lastname"], $_GET["email"], $_GET["password"], $isAdmin);
    
    $database = new MySqlDatabase();
   
    $database->open();
    $database->addUser($user);        
    $database->close();
    
    unset($database);
    unset($user);

    // Read the return address
    $address = $_GET["returnAddress"];
    // Return to previous page
    header( "Location: $address");
?>
