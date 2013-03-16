<?php
	include '../Classes/GalleryItem.php';
	include '../Classes/NewsItem.php';
	include '../Classes/Comment.php';
	
	interface IDataStorer
	{
		// Saves a new user to the data store
		public function saveUser($name, $email, $password, $isAdmin);
		
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