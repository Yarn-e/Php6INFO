<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <header>
            <h1>Inloggen</h1>
        </header>
        <section>
            <form method="post" action="files/login.php">
                <p>
                    <label>
                        <span>Gebruikersnaam:</span>
                        <input type="text" name="user" id="users" required>
                    </label>
                </p>
                <p>
                    <label>
                        <span>Wachtwoord:</span>
                        <input type="password" name="pass" id="pass" required>
                    </label>
                </p>
                <p class="centreren">
                    <button type="submit">
                        <img src="../../icons/tick.png">
                        Inloggen
                    </button>
                </p>
            </form>
        </section>
        <footer>
            <h3>&copy; Decuyper Yarne</h3>
        </footer>
    </body>
</html>


