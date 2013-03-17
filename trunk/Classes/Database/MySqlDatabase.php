<?php
    require_once dirname(__FILE__) . '/../../Interfaces/IDataStorer.php';
    require_once dirname(__FILE__) . '/../../Interfaces/IDataReader.php';
    require_once dirname(__FILE__) . '/../User.php';

    class MySqlDatabase implements IDataStorer, IDataReader
    {
        private $server;
        private $username;
        private $password;

        function __construct()
        {
            $this->server = 'localhost';
            $this->username = 'root';
            $this->password = 'babie0d5';

            $this->createAdminUserIfMissing();
        }

        public function open()
        {
            mysql_connect($this->server, $this->username, $this->password);
            mysql_select_db("pbkdekor") or die ("Unable to select database pbkdekor");
        }

        public function close()
        {
            mysql_close();
        }

        private function createAdminUserIfMissing()
        {
            $this->open();
            $result = mysql_query("select count(*) from Users");
            $row = mysql_fetch_assoc($result);
            $userCount = $row['count(*)'];
            $this->close();

            if ($userCount == 0)
            {
                    $this->createUser("Daniel", "Kling", "daniel.kling@gmail.com", "babie0d5", true);
            }
            
            mysql_free_result($result);
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
            $query = "insert into users values (null, '$firstName', '$lastName', '" . $this->encodePassword($password) . "', '$email', $isAdmin)";
            mysql_query($query);
        }

        // Deletes the user with the given id
        public function deleteUser($id)
        {
            $query = "delete from users where id=$id";
            mysql_query($query);
        }

        // Saves a new gallery item comment
        public function saveGalleryItemComment($galleryItemId, $text, $username, $email)
        {
            // TODO: Implement
        }

        // Delete a gallery item comment
        public function deleteGalleryItemComment($id)
        {
            // TODO: Implement
        }

        // Saves a news item comment
        public function saveNewsItemComment($newsItemId, $text, $username, $email)
        {
            // TODO: Implement
        }

        // Delete news item comment
        public function deleteNewsItemComment($id)
        {
            // TODO: Implement
        }

        // Saves a new news item
        public function saveNewsItem($text, $user, $date)
        {
            // TODO: Implement
        }

        // Deletes a news item
        public function deleteNewsItem($id)
        {
            // TODO: Implement
        }

        // Saves a new gallery item
        public function saveGalleryItem($imageName, $category)
        {
            // TODO: Implement
        }

        // Deletes a gallery item
        public function deleteGalleryItem($id)
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
            $query = "select id, firstName, lastName, email, isAdmin from users";
            $result = mysql_query($query);
            
            $users = array();
            
            while($row = mysql_fetch_array($result, MYSQL_BOTH))
            {
                $users[] = new User($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
            
            mysql_free_result($result);
            
            return $users;
        }

        // Gets the user with the given username
        public function getUser($username)
        {
            // TODO: Implement
        }
    }

?>