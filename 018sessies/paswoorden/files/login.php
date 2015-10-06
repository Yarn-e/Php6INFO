<?php
session_start();
//userid en pw
$gebruikercontrole = 'admin';
$pwcontrole = 'VoorBeeld';
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
            <h1>Login</h1>
        </header>
        <section>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['user'], $_POST['pass'])) {
                    $Gebruiker = trim($_POST['user']);
                    $Wachtwoord = trim($_POST['pass']);

                    if ($Gebruiker == $gebruikercontrole && $Wachtwoord == $pwcontrole) {
                        //Juiste user en pw
                        $_SESSION['logged_in'] = true;
                        $_SESSION['gebruiker'] = $Gebruiker;
                        //doorsturen naar beveiligd gedeelte
                        header('Refresh: 3; url=beveiligd.php');
                        echo 'U bent succesvol ingelogd<br>U wordt doorgestuurt.';
                    } else {
                        //Foute user en pw
                        header('Refresh: 3; url=../login_form.php');
                        echo 'Deze combinatie van gebruikersnaam en wachtwoord is niet correct!';
                    }
                } else {
                    //Foute user en pw
                    header('Refresh: 3; url=../login_form.php');
                    echo 'U moet alle velden invullen!';
                }
            } else {
                //form is niet gepost
                header('Location:./../login_form.php');
            }
            ?>
        </section>
        <footer>
            <h3>&copy; Decuyper Yarne</h3>
        </footer>
    </body>
</html>


