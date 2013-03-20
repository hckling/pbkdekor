<?php
    require_once dirname(__FILE__) . '/../Classes/GalleryItem.php';
    require_once dirname(__FILE__) . '/../Classes/NewsItem.php';
    require_once dirname(__FILE__) . '/../Classes/Comment.php';

    interface IDataStorer
    {
        // Saves a new user to the data store
        public function addUser(User $user);

        // Delete the user with the given id
        public function deleteUser($id);

        // Saves a new gallery item comment
        public function storeGalleryItemComment($galleryItemId, Comment $comment);

        // Delete a gallery item comment
        public function deleteGalleryItemComment($id);

        // Saves a news item comment
        public function storeNewsItemComment($newsItemId, Comment $comment);

        // Delete news item comment
        public function deleteNewsItemComment($id);

        // Saves a new news item
        public function storeNewsItem(NewsItem $newsItem);
        
        // Edits an existing news item
        public function editNewsItem(NewsItem $newsItem);

        // Deletes a news item
        public function deleteNewsItem($id);

        // Saves a new gallery item
        public function storeGalleryItem(GalleryItem $galleryItem);

        // Deletes a gallery item
        public function deleteGalleryItem($id);
    }
?>