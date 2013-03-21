<?php
    require_once '../classes/database/MySqlDatabase.php';
    
    if (isset($_POST["btnDelete"]))
    {
        $database = new MySqlDatabase();
        $database->open();
        
        $database->deleteNewsItem($_POST["newsItemId"]);
        
        $database->close();
        
        unset($database);
        
        // Read the return address
        $address = $_POST["returnAddress"];
        // Return to previous page
        header( "Location: $address");
    } else
    {
        echo "Edit " . $_POST["newsItemId"];
    }
?>
