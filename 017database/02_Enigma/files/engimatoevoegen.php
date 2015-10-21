<?php
session_start();
if (!isset($_SESSION['Inlog'])) {
    header('Location:../index.php');
    exit;
}
//connectie met database.
include('../inc/Verbinding_inc.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //ophalen van gegevens uit post
    $voornaam = $link->real_escape_string($_POST['voornaam']);
    $achternaam = $link->real_escape_string($_POST['achternaam']);
    $telefoon = $link->real_escape_string($_POST['telefoon']);
    $email = $link->real_escape_string($_POST['email']);
    $gebruikersnaam = $link->real_escape_string($_POST['gebruiker']);
    $wachtwoord = $link->real_escape_string($_POST['wachtwoord']);

    $sql = "INSERT INTO 02_Enigma(
                Achternaam,
                Voornaam,
                Telefoon,
                Email,
                Gebruikersnaam,
                Wachtwoord)
            VALUES(
                '$voornaam',
                '$achternaam',
                '$telefoon',
                '$email',
                '$gebruikersnaam',
                '$wachtwoord')";
    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
        header('Location:../engimaindex.php');
        exit();
    } else {
        $_SESSION['alertify'] = 'alertify.success("' . $achternaam . ' is succesvol toegevoegd.")';
        header('Location:../engimaindex.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Gast toevoegen</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gast toevoegen</h1>
        </header>
        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>
                    <span>Voornaam:</span>
                    <input type="text" name="voornaam" required>
                </label>

                <label>
                    <span>Achternaam:</span>
                    <input type="text" name="achternaam" required>
                </label>

                <label>
                    <span>Telefoon:</span>
                    <input type="text" name="telefoon" required>
                </label>

                <label>
                    <span>Email:</span>
                    <input type="text" name="email" required>
                </label>

                <label>
                    <span>Gebruikersnaam:</span>
                    <input type="text" name="gebruiker" required>
                </label>

                <label>
                    <span>Wachtwoord:</span>
                    <input type="password" name="wachtwoord" required>
                </label><br style="clear:both;">

                <p class="centreren">
                    <button type="submit">
                        <img src="../img/page_white_add.png" alt="">
                        Toevoegen
                    </button>
                    <button type="reset">
                        <img src="../img/page_white_delete.png" alt="">
                        Formulier leegmaken
                    </button>
                </p>
                <br style="clear:both;">    
            </form>
        </section>
        <section>
            <div class="centreren">
                <a href="../engimaindex.php"><button>
                        <img src="../img/arrow_left.png" alt="">
                        Terug naar index
                    </button>
                </a>
            </div>
        </section>
        <footer>
            &copy Yarne Decuyper
        </footer>
    </div>
</body>
</html>


