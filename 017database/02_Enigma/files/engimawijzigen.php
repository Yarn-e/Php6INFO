<?php
session_start();
if (!isset($_SESSION['Inlog'])) {
    header('Location:../index.php');
    exit;
}
//connectie met database.
include('../inc/Verbinding_inc.php');

if (($_SERVER['REQUEST_METHOD'] == "GET") && (isset($_GET['GastID']))) {
    $id = $link->real_escape_string($_GET['GastID']);
    $sql = 'SELECT * FROM 02_Enigma WHERE Gast_ID =' . $id;

    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
        header('Location:../engimaindex.php');
        exit();
    } else {
        $row = $res->fetch_assoc();
        $Gast = $row['Achternaam'] . " " . $row['Voornaam'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['wijzigid'])) {
    $Achternaam = trim($link->real_escape_string($_POST['Achternaam']));
    $Voornaam = trim($link->real_escape_string($_POST['Voornaam']));
    $Telefoon = trim($link->real_escape_string($_POST['Telefoon']));
    $Email = trim($link->real_escape_string($_POST['Email']));
    $Gebruikersnaam = trim($link->real_escape_string($_POST['Gebruikersnaam']));
    $Wachtwoord = trim($link->real_escape_string($_POST['Wachtwoord']));
    $Gast_id = trim($link->real_escape_string($_POST['wijzigid']));
    $sql = "UPDATE 02_Enigma SET
           Achternaam = '$Achternaam',
           Voornaam = '$Voornaam',
           Telefoon = '$Telefoon',    
           Email = '$Email',
           Gebruikersnaam = '$Gebruikersnaam',
           Wachtwoord = '$Wachtwoord'
           WHERE Gast_ID = '$Gast_id'";

    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
    } elseif ($link->affected_rows > 0) {
        //Update is gelukt
        $_SESSION['alertify'] = 'alertify.success("' . $Voornaam . ' ' . $Achternaam . ' is succesvol gewijzigd")';
    } else {
        $_SESSION['alertify'] = 'alertify.error("Er is geen veld gewijzigd")';
    }
    header('Location:../engimaindex.php');
    exit();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Gast Wijzigen</title>
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo $Gast; ?> Wijzigen</h1>
        </header>
        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>
                    <span>Achternaam:</span>
                    <input type="text" name="Achternaam" value="<?php echo $row['Achternaam']; ?>" required>
                </label>

                <label>
                    <span>Voornaam:</span>
                    <input type="text" name="Voornaam" value="<?php echo $row['Voornaam']; ?>" required>
                </label>

                <label>
                    <span>Telefoon:</span>
                    <input type="text" name="Telefoon" value="<?php echo $row['Telefoon']; ?>" required>
                </label>

                <label>
                    <span>Email:</span>
                    <input type="text" name="Email" value="<?php echo $row['Email']; ?>" required>
                </label>

                <label>
                    <span>Gebruikersnaam:</span>
                    <input type="text" name="Gebruikersnaam" value="<?php echo $row['Gebruikersnaam']; ?>" required>
                </label>

                <label>
                    <span>Wachtwoord:</span>
                    <input type="text" name="Wachtwoord" value="<?php echo $row['Wachtwoord']; ?>" required>
                </label><br style="clear:both;">

                <p class="centreren">
                    <input type="hidden" name="wijzigid" value="<?php echo $id; ?>">
                    <button type="submit">
                        <img src="../img/page_white_add.png" alt="">
                        Wijzigen
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




