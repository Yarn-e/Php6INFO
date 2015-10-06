<?php
//Session starten.
session_start();

//Controleren of ingelogd.
if (!isset($_SESSION['logged_in'])) {
    header('Location:./../login_form.php');
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
    </head>
    <body>
        <header>
            <h1>Afmelden</h1>
        </header>
        <section>
            <?php
            //sessie eindigen en terug naar login
            session_destroy();
            header('Refresh: 3; url=../login_form.php');
            ?>
            <p class="centreren">U bent afgemeld.</p>
        </section>
        <footer>
            <h3>&copy; Decuyper Yarne</h3>
        </footer>
    </body>
</html>




