<?php

	interface ILoginManager
	{
		// Login using the given username and password
		public function login($username, $password);
		
		// Logout the current user
		public function logout();
	}
?>