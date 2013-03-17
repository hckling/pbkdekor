<?php
    $database = new MySqlDatabase();
    
    $database->open();
    
    foreach ($_GET as $key => $value)
    {
        $database->deleteUser($key);
    }
    
    $database->close();
    
    unset($database);
?>
