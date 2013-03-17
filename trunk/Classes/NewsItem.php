<?php
    require_once dirname(__FILE__) . '/../Interfaces/IGuiElement.php';

    class NewsItem implements IGuiElement
    {
        public function getHtml()
        {
            return 'NewsItem';
        }
    }
?>