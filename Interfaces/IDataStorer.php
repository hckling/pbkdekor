<?php
	require_once dirname(__FILE__) . '/../Classes/GalleryItem.php';
	require_once dirname(__FILE__) . '/../Classes/NewsItem.php';
	require_once dirname(__FILE__) . '/../Classes/Comment.php';
	
	interface IDataStorer
	{
		// Saves a new user to the data store
		public function createUser($firstName, $lastName, $email, $password, $isAdmin);
		
		// Saves a new gallery item comment
		public function saveGalleryItemComment($galleryItemId, $text, $username, $email);
		
		// Saves a news item comment
		public function saveNewsItemComment($newsItemId, $text, $username, $email);
		
		// Saves a new news item
		public function saveNewsItem($text, $user, $date);
		
		// Saves a new gallery item
		public function saveGalleryItem($imageName, $category);
	}
?>