<?php
    require_once dirname(__FILE__) . '/../Interfaces/IGuiElement.php';

    class NewsItem implements IGuiElement
    {
        private $id;
        private $header;
        private $text;
        private $imageName;
        private $date;
        private $user;
        private $language;
        
        public function __construct($id, $header, $text, $imageName, $date, $language, User $user) 
        {
            $this->id = $id;
            $this->header = $header;
            $this->text = $text;
            $this->imageName = $imageName;
            $this->date = $date;
            $this->language = $language;
            $this->user = $user;
        }
        
        public function getHtml()
        {
            $html = "</table>\n" .
                        "<tr><td>$this->header</td></tr>\n" .
                        "<tr><td>$this->text</td></tr>\n" .
                        "<tr><td><image src=\"newsImages/$this->imageName\"/>\n" .
                        "<tr><td>$this->user->getUserName()</td><td>$this->date</td></tr>\n" .
                    "</table>";
                        
            return $html;
        }
        
        public function getId() { return $this->id; }
        public function setId($value) { $this->id = $value; }
        
        public function getHeader() { return $this->header; }
        public function getText() { return $this->text; }
        public function getImageName() { return $this->imageName; }
        public function getDate() { return $this->date; }
        public function getUser() { return $this->user; }
        public function getUserId() { return $this->user->getId(); }
        public function getLanguage() { return $this->language; }
    }
?>