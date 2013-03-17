<?php
    require_once dirname(__FILE__) . '/../Classes/GalleryItem.php';
    require_once dirname(__FILE__) . '/../Classes/NewsItem.php';
    require_once dirname(__FILE__) . '/../Classes/Comment.php';

    interface IDataStorer
    {
        // Saves a new user to the data store
        public function createUser($firstName, $lastName, $email, $password, $isAdmin);

        // Delete the user with the given id
        public function deleteUser($id);

        // Saves a new gallery item comment
        public function saveGalleryItemComment($galleryItemId, $text, $username, $email);

        // Delete a gallery item comment
        public function deleteGalleryItemComment($id);

        // Saves a news item comment
        public function saveNewsItemComment($newsItemId, $text, $username, $email);

        // Delete news item comment
        public function deleteNewsItemComment($id);

        // Saves a new news item
        public function saveNewsItem($text, $user, $date);

        // Deletes a news item
        public function deleteNewsItem($id);

        // Saves a new gallery item
        public function saveGalleryItem($imageName, $category);

        // Deletes a gallery item
        public function deleteGalleryItem($id);
    }
?>