<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Administration</title>
    </head>
    <body>
        <p>
            Skapa användare<br>
            <form name="createUser" action="php\register_user.php" method="get">
                <label for="editFirstname">Förnamn:<label>
                <input type="text" name="firstname" id="editFirstname"><br>
                
                <label for="editLastname">Efternamn:<label>
                <input type="text" name="lastname" id="editLastname"><br>
                
                <label for="email">Email:<label>
                <input type="text" name="email"><br>
                
                <label for="password">Lösenord:<label>
                <input type="password" name="password"><br>
                
                <label for="repeatedPassword">Repetera lösenord:<label>
                <input type="password" name="repeatedPassword" label="Repetera lösenord"><br>
                
                <label for="firstname">Admin:<label>
                <input type="checkbox" name="isAdmin"><br>
            
                <input type="hidden" name="returnAddress" value="../administration.php" visible="false"/>
                <input type="submit" value="Skapa användare">
            </form>
        </p>
        <p>
            Existerande användare<br>
            <?php
                require_once './classes/database/MySqlDatabase.php';

                $database = new MySqlDatabase();

                $database->open();
                $users = $database->getUsers();
                $database->close();

                echo "<form name=\"deleteUser\" action=\"php/delete_user.php\" method=\"get\">\n";

                foreach ($users as $user)
                {
                    $id = $user->getId();
                    echo "\t\t" . $user->getHtml() . " <input type=\"submit\" name=\"$id\" value=\"Radera\">" . "<br>\n";
                    //unset($user);
                }
                echo "\t\t<input type=\"hidden\" name=\"returnAddress\" value=\"../administration.php\" visible=\"false\"/>\n";
                echo "</form>\n";

                unset($database);
            ?>
        </p>
        <p>
            Skapa nyhet<br>
            <form name="createUser" action="php\create_newsitem.php" method="post" enctype="multipart/form-data">
                <label for="header">Rubrik:<label>
                <input type="text" name="header"><br>
                <label for="text">Text:</label>
                <textarea rows="10" name="text"></textarea><br>
                <label for="image">Bild:<label>
                <input type="file" name="image"><br>
                <input type="hidden" name="returnAddress" value="../administration.php" visible="false"/>
                <input type="submit" value="Skapa nyhet">
            </form>
        </p>
    </body>
</html>
