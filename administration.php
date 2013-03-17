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
            <form name="createUser" action="php\register_user.php" method="get">
                Förnamn: <input type="text" name="firstname"><br>
                Efternamn: <input type="text" name="lastname"><br>
                Email: <input type="text" name="email"><br>
                Lösenord: <input type="password" name="password"><br>
                Repetera lösenord: <input type="password" name="repeatedPassword" label="Repetera lösenord"><br>
                Admin: <input type="checkbox" name="isAdmin"><br>
                <input type="hidden" name="returnAddress" value="../administration.php" visible="false"/>
                <input type="submit" value="Skapa användare">
            </form>
        </p>
        <p>
            Existing users:<br>
            <?php
                require_once './classes/database/MySqlDatabase.php';

                $database = new MySqlDatabase();

                $database->open();
                $users = $database->getUsers();
                $database->close();

                echo "<form name=\"deleteUser\" action=\"php/delete_user.php\" method=\"get\">";

                foreach ($users as $user)
                {
                    $id = $user->getId();
                    echo $user->getHtml() . " <input type=\"submit\" name=\"$id\" value=\"Radera\">" . "<br>";
                    //unset($user);
                }
                echo "<input type=\"hidden\" name=\"returnAddress\" value=\"../administration.php\" visible=\"false\"/>";
                echo "</form>";

                unset($database);
            ?>
        </p>
    </body>
</html>
