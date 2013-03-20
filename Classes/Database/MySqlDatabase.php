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
                    $this->addUser("Daniel", "Kling", "daniel.kling@gmail.com", "babie0d5", true);
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
        public function addUser(User $user)
        {			
            $query = "insert into users values (null, '" . $user->getFirstName() . "', '" . $user->getLastName() . "', '" . $this->encodePassword($user->getPassword()) . "', '" . $user->getEmail() . "', '" . $user->getIsAdmin() . "')";
            mysql_query($query);
            $user->setId(mysql_insert_id());
        }

        // Deletes the user with the given id
        public function deleteUser($id)
        {
            $query = "delete from users where id=$id";
            mysql_query($query);
        }

        // Saves a new gallery item comment
        public function storeGalleryItemComment($galleryItemId, Comment $comment)
        {
            // TODO: Implement
        }

        // Delete a gallery item comment
        public function deleteGalleryItemComment($id)
        {
            // TODO: Implement
        }

        // Saves a news item comment
        public function storeNewsItemComment($newsItemId, Comment $comment)
        {
            // TODO: Implement
        }

        // Delete news item comment
        public function deleteNewsItemComment($id)
        {
            // TODO: Implement
        }

        // Saves a new news item
        public function storeNewsItem(NewsItem $newsItem)
        {
            $query = "insert into news values ('', '" . 
                    $newsItem->getHeader() . "', '" . 
                    $newsItem->getText() . "', '" .
                    $newsItem->getImageName() . "', '" .
                    $newsItem->getDate() . "', " .
                    $newsItem->getUserId() . ", " . 
                    $newsItem->getLanguage() . ")";
            mysql_query($query);
            
            echo $query . '<br>';
            
            $newsItem->setId(mysql_insert_id());
            
            echo $newsItem->getId();
        }
        
        public function editNewsItem(NewsItem $newsItem)
        {
            
        }

        // Deletes a news item
        public function deleteNewsItem($id)
        {
            // TODO: Implement
        }

        // Saves a new gallery item
        public function storeGalleryItem(GalleryItem $galleryItem)
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
                $users[] = new User($row[0], $row[1], $row[2], $row[3], '', $row[4]);
            }
            
            mysql_free_result($result);
            
            return $users;
        }

        // Gets the user with the given username
        public function getUser($id)
        {
            $query = "select id, firstName, lastName, email, isAdmin from Users where id=$id";
            $result = mysql_query($query);
            $row = mysql_fetch_row($result);
            $user = new User($row[0], $row[1], $row[2], $row[3], '', $row[4]);
            
            return $user;
        }
    }

?>