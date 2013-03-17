<?php
    require_once '../classes/database/MySqlDatabase.php';
    
    $database = new MySqlDatabase();
    
    $database->open();
    
    $address = $_GET["returnAddress"];
    unset($_GET["returnAddress"]);
    
    foreach ($_GET as $key => $value)
    {
        $result = $database->deleteUser($key);
        if (!$result)
            echo "Failed to delete user!";
    }
    
    $database->close();
    
    unset($database);
    header( "Location: $address");
?>
