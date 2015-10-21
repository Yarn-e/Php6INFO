<?php
include('inc/Verbinding_inc.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['Uitloggen'])) {
    session_destroy();
    header('Location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gebruiker = $link->real_escape_string($_POST['Gebruiker']);
    $wachtwoord = $link->real_escape_string($_POST['Paswoord']);
    $sql = "SELECT Gebruikersnaam, Wachtwoord
            FROM 02_Enigma
            WHERE Gebruikersnaam = '$gebruiker' AND Wachtwoord = '$wachtwoord'";

    if (!$res = $link->query($sql)) {
        $fout = '<script>alertify.error("' . $link->error . '")</script>';
    } else {
        if ($res->fetch_assoc()) {
            $_SESSION['Inlog'] = 'True';
            header('Location:./engimaindex.php');
        } else {
            $fout = 'alertify.error("Gebruikersnaam/Wachtwoord klopt niet!")';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yarne Decuyper">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <!-- Style -->
        <link rel="stylesheet" href="css/alertify.min.css">
        <link rel="stylesheet" href="css/semantic.min.css">
        <!-- Altertify -->
        <script src="js/alertify.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> 
        <script>
            alertify.defaults.glossary.title = 'Enigma';
            alertify.defaults.glossary.ok = 'Bevestigen';
            alertify.defaults.glossary.cancel = 'Annuleren';
        </script>
        <script>
            function Inloggen() {

                alertify.genericDialog || alertify.dialog('genericDialog', function () {
                    return {
                        main: function (content) {
                            this.setContent(content);
                        },
                        setup: function () {
                            return {
                                focus: {
                                    element: function () {
                                        return this.elements.body.querySelector(this.get('selector'));
                                    },
                                    select: true
                                },
                                options: {
                                    basic: true,
                                    maximizable: true,
                                    resizable: true,
                                    padding: false
                                }
                            };
                        },
                        settings: {
                            selector: undefined
                        }
                    };
                });
                alertify.genericDialog($('#Alertifyform')[0]).set('selector', 'input[type="password"]');
            }
        </script>
        <title>Hotel Enigma: Login</title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Inloggen</h1>
            </header>
            <section>
                <?php
                if (isset($fout)) {
                    echo '<script>' . $fout . '</script>';
                    $fout = '';
                }
                ?>
                <div class="frontpagecenter">
                    <div class="righty">
                        <img src="img/enigmalogo.png" alt="Logo van Enigma">
                    </div>

                    <h2>Gelieve in te loggen</h2>

                    <button onclick="Inloggen();">
                        <img src="img/door_in.png" alt="inloggen">
                        Inloggen
                    </button>
                </div>
                <br style="clear:both">
                <form id="Alertifyform" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label>
                        <span>Gebruikersnaam</span>
                        <input type="text" name="Gebruiker" required>
                    </label>
                    <label>
                        <span>Paswoord</span>
                        <input type="password" name="Paswoord" required>
                    </label>
                    <div class="centreren">
                        <button type="submit">
                            <img src="img/door_in.png" alt="inloggen">
                            Inloggen
                        </button> 
                    </div>

                </form>
            </section>
            <footer>
                &copy Yarne Decuyper
            </footer>
        </div>
    </body>
</html>


