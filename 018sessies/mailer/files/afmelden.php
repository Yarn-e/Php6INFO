<?php
//Session starten.
session_start();

//Controleren of ingelogd.
if (!isset($_SESSION['logged_in'])) {
    header('Location:./../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <meta name="google-signin-client_id" content="871492745799-3nmcgrpoh6nd6v9bg2932gvj2muc823e.apps.googleusercontent.com">
    </head>
    <body>
        <header>
            <h1>Afmelden</h1>
        </header>
        <section>
            <?php
            //sessie eindigen en terug naar login
            session_destroy();
            header('Location:./../login.php');
            ?>
        </section>
        <footer>
            <h3>&copy; Decuyper Yarne</h3>
        </footer>
    </body>
</html>




