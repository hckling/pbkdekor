<?php
    require_once dirname(__FILE__) . '/../Classes/GalleryItem.php';
    require_once dirname(__FILE__) . '/../Classes/NewsItem.php';
    require_once dirname(__FILE__) . '/../Classes/Comment.php';

    interface IDataReader
    {
        // Gets all gallery items, including comments
        public function getGalleryItems();

        // Gets all news items including comments
        public function getNewsItems();

        // Gets all users
        public function getUsers();

        // Gets the user with the given username
        public function getUser($id);
    }	
?>