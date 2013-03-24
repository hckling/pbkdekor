<?php

require_once dirname(__FILE__) . '/../Interfaces/IGuiElement.php';

class EditNewsItemForm implements IGuiElement
{
    private $newsItem;
    private $action;
    private $name;
    private $returnAddress;
    
    public function __construct(NewsItem $newsItem, $action, $name, $returnAddress) 
    {
        $this->newsItem = $newsItem;
        $this->action = $action;
        $this->name = $name;
        $this->returnAddress = $returnAddress;
    }
    
    public function getHtml()
    {
        if ($this->newsItem == NULL)
        {
            echo "<form name=\"$this->name\" action=\"$this->action\" method=\"post\" enctype=\"multipart/form-data\">";
            echo "<label for=\"header\">Rubrik:</label>";
            echo "<input type=\"text\" name=\"header\"><br>";
            echo "<label for=\"text\">Text:</label>";
            echo "<textarea rows=\"10\" name=\"text\"></textarea><br>";
            echo "<label for=\"image\">Bild:</label>";
            echo "<input type=\"file\" name=\"image\"><br>";
            echo "<input type=\"hidden\" name=\"returnAddress\" value=\"$this->returnAddress\" visible=\"false\"/>";
            echo "<input type=\"submit\" value=\"Skapa nyhet\">";
            echo "</form>";        
        }
        else
        {
            echo "<form name=\"$this->name\" action=\"$this->action\" method=\"post\" enctype=\"multipart/form-data\">";
            echo "<label for=\"header\">Rubrik:</label>";
            echo "<input type=\"text\" name=\"header\" value=\"" . $this->newsItem->getHeader() . "\"><br>";
            echo "<label for=\"text\">Text:</label>";
            echo "<textarea rows=\"10\" name=\"text\" value=\"" . $this->newsItem->getText() . "\"></textarea><br>";
            echo "<label for=\"image\">Nuvarande bild:</label>";
            echo "<input type=\"text\" name=\"image\" value=\"" . $this->newsItem->getImageName() . "\" disabled><br>";
            echo "<label for=\"image\">Ny bild:</label>";
            echo "<input type=\"file\" name=\"image\"><br>";
            echo "<input type=\"hidden\" name=\"returnAddress\" value=\"$this->returnAddress\" visible=\"false\"/>";
            echo "<input type=\"submit\" value=\"Redigera nyhet\">";
            echo "</form>";
        }
    }
}

?>
