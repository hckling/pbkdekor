<?php
	include '../../Interface/IDataStorer.php';
	include '../../Interface/IDataReader.php';
	
	class MySqlDatabase implements IDataStorer, IDataReader
	{
		// IDataStorer
		
		// Saves a new user to the data store
		public function saveUser($name, $email, $password)
		{
			// TODO: Implement
		}		
		
		// Saves a new gallery item comment
		public function saveGalleryItemComment($galleryItemId, $text, $username, $email)
		{
			// TODO: Implement
		}
		
		// Saves a news item comment
		public function saveNewsItemComment($newsItemId, $text, $username, $email)
		{
			// TODO: Implement
		}
		
		// Saves a new news item
		public function saveNewsItem($text, $user, $date)
		{
			// TODO: Implement
		}
		
		// Saves a new gallery item
		public function saveGalleryItem($imageName, $category)
		{
			// TODO: Implement
		}
		
		// IDataReader
		
		// Gets all gallery items, including comments
		public function getGalleryItems()
		{
			// TODO: Implement
		}
		
		// Gets all news items including comments
		public function getNewsItems()
		{
			// TODO: Implement
		}
		
		// Gets all users
		public function getUsers()
		{
			// TODO: Implement
		}
		
		// Gets the user with the given username
		public function getUser($username)
		{
			// TODO: Implement
		}
	}

?>