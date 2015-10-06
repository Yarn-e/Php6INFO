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
            <h1>Beveiligd 2</h1>
        </header>
        <section>
            <p class="centreren">
                Welkom <?php echo $_SESSION['gebruiker'] ?><br>
                Leuk dat je er weer bent.<br>
                Dit is een beveiligd gedeelte van de site.<br><br>
                <a href="beveiligd.php">Terug naar de eerste pagina</a>
            </p>
            <br>
            <hr>
            <p class="centreren">
                <a href="afmelden.php">
                    <button type="button">
                        <img src="../../../icons/cross.png" alt="">
                        Afmelden
                    </button>
                </a>
            </p>
        </section>
        <footer>
            <h3>&copy; Decuyper Yarne</h3>
        </footer>
    </body>
</html>





