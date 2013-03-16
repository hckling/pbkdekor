<?php
	include '../../Interface/IDataStorer.php';
	include '../../Interface/IDataReader.php';
	
	class MySqlDatabase implements IDataStorer, IDataReader
	{
		private $server;
		private $username;
		private $password;
		
		MySqlDatabase($server, $username, $password)
		{
			$this->$server = $server;
			$this->$username = $username;
			$this->$password = $password;
			
			createAdminUserIfMissing();
		}
		
		private function connect()
		{
			mysql_connect($this->$server, $this->$username, $this->$password);
			mysql_select_db("pbkdekor") or die ("Unable to select database pbkdekor");
		}
		
		private function close()
		{
			mysql_close();
		}
		
		private function createAdminUserIfMissing()
		{
			connect();
			$userCount = mysql_query("select count('ID') from Users");
			close();
			
			if ($userCount = 0)
			{
				saveUser("Daniel", "Kling", "babie0d5", "daniel.kling@gmail.come", true);
			}			
		}
		
		private function encodePassword($password)
		{
			// TODO: Implement some kind of encryption
			return $password;
		}
		
		// IDataStorer
		
		// Saves a new user to the data store
		public function saveUser($firstName, $lastName, $email, $password, $isAdmin)
		{
			$query = "insert into Users values ('', ". $name . ", " . $lastName . ", " . encodePassword($password) . ", " . $email . ", " . $isAdmin . ")";
			mysql_query($query);
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