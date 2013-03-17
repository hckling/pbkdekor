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
        <form name="createUser" action="register_user.php" method="get">
            Förnamn: <input type="text" name="firstname"><br>
            Efternamn: <input type="text" name="lastname"><br>
            Email: <input type="text" name="email"><br>
            Lösenord: <input type="password" name="password"><br>
            Repetera lösenord: <input type="password" name="repeatedPassword"><br>
            Admin: <input type="checkbox" name="isAdmin"><br>
            <input type="submit" value="Skapa användare">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
