<?php
    require_once '../classes/database/MySqlDatabase.php';
    
    
    // Receive the uploaded file and move it to the news item images folder
    if ($_FILES["image"]["error"] > 0)
    {
        echo "Error: " . $_FILES["image"]["error"] . "<br>";
    }
    else
    {
        $filename = $_FILES["image"]["name"];
        $serverPath = $_FILES["image"]["tmp_name"];
        
        if (!is_dir("../newsImages"))
        {
            echo "../newsImages is not a directory! Creating...<br>";
            mkdir("../newsImages");
            if (is_dir("../newsImages"))
                echo "Success!<br>";
        }
        
        move_uploaded_file($serverPath, "../newsImages/$filename");        
    }
    
    $database = new MySqlDatabase();    
    $database->open();    
    $database->createNewsItem($_POST["header"], $_POST["text"], $filename, date('Y-m-d H:i:s'), 2, 1);    
    $database->close();    
    unset($database);
    
    // Read the return address
    $address = $_POST["returnAddress"];
    // Return to previous page
    header( "Location: $address");
?>
