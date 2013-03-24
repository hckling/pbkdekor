<?php
    require_once '../classes/database/MySqlDatabase.php';
    require_once './editNewsItemForm.php';
    
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
    } 
    else
    {
        $database = new MySqlDatabase();
        $database->open();
        
        $newsItem = $database->getNewsItem($_POST["newsItemId"]);
        
        $database->close();        
        
        unset($database);
        
        $editNewsItem = new EditNewsItemForm($newsItem, 'editNewsItem.php', 'editNewsItem', $_POST["returnAddress"]);
        echo $editNewsItem->getHtml();
        unset($editNewsItem);       
        unset($newsItems);
    }
?>
