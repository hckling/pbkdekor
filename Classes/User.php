<?php
    require_once dirname(__FILE__) . '/../Interfaces\IGuiElement.php';

    class User implements IGuiElement
    {
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $isAdmin;
        private $password;
        
        public function getHtml() 
        {
            return $this->getFullName();
        }
        
        public function __construct($id, $firstName, $lastName, $email, $password, $isAdmin)
        {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->isAdmin = $isAdmin;
            $this->password = $password;
        }
        
        public function getFullName()
        {
            return "$this->firstName $this->lastName";
        }
        
        public function getFirstName() { return $this->firstName; }
        
        public function getLastName() { return $this->lastName; }
        
        public function getEmail()
        {
            return $this->email;
        }
        
        public function getId()
        {
            return $this->id;
        }
        
        public function setId($value)
        {
            $this->id = $value;
        }
        
        public function getIsAdmin()
        {
            return $this->isAdmin;
        }
        
        public function getPassword() { return $this->password; }
    }
?>