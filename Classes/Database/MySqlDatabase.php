<?php
	require_once dirname(__FILE__) . '/../../Interfaces/IDataStorer.php';
	require_once dirname(__FILE__) . '/../../Interfaces/IDataReader.php';
	
	class MySqlDatabase implements IDataStorer, IDataReader
	{
		private $server;
		private $username;
		private $password;
		
		function __construct($server, $username, $password)
		{
			$this->server = $server;
			$this->username = $username;
			$this->password = $password;
			
			$this->createAdminUserIfMissing();
		}
		
		private function connect()
		{
			mysql_connect($this->server, $this->username, $this->password);
			mysql_select_db("pbkdekor") or die ("Unable to select database pbkdekor");
		}
		
		private function close()
		{
			mysql_close();
		}
		
		private function createAdminUserIfMissing()
		{
			$this->connect();
			$result = mysql_query("select count(*) from Users");
			$row = mysql_fetch_assoc($result);
			$userCount = $row['count(*)'];
			$this->close();
			
			echo "Number of users: $userCount";
			
			if ($userCount == 0)
			{
				$this->createUser("Daniel", "Kling", "babie0d5", "daniel.kling@gmail.come", true);
			}
		}
		
		private function encodePassword($password)
		{
			// TODO: Implement some kind of encryption
			return $password;
		}
		
		// IDataStorer
		
		// Saves a new user to the data store
		public function createUser($firstName, $lastName, $email, $password, $isAdmin)
		{
			$this->connect();
			
			$query = "insert into users values (null, '$firstName', '$lastName', '" . $this->encodePassword($password) . "', '$email', $isAdmin)";
			echo "<br>" . $query;
			mysql_query($query);
			
			$this->close();
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