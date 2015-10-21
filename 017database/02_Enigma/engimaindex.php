<?php
session_start();
if (!isset($_SESSION['Inlog'])) {
    header('Location:./index.php');
    exit;
}
//connectie met database.
include('inc/Verbinding_inc.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['verwijder'])) {
    $id = trim($link->real_escape_string($_GET['verwijder']));
    $Achternaam = trim($link->real_escape_string($_GET['Achternaam']));
    $sql = "DELETE FROM 02_Enigma WHERE Gast_ID = $id";
    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
    } else {
        $_SESSION['alertify'] = 'alertify.success("' . $Achternaam . ' is succesvol verwijderd")';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['zoeken'])) {
    $zoektekst = trim($link->real_escape_string($_POST['zoeken']));
    $sql = "SELECT Gast_ID, Achternaam, Voornaam
            FROM 02_Enigma
            WHERE Achternaam LIKE '$zoektekst%'
            ORDER BY Achternaam
            ";
} else {
    $sql = 'SELECT Gast_ID, Achternaam, Voornaam
                FROM 02_Enigma
                ORDER BY Achternaam';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yarne Decuyper">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http/fonts.googleapis.com/css?family=Roboto' rel = 'stylesheet' type = 'text/css'>
        <!--Style -->
        <link rel="stylesheet" href = "css/alertify.min.css">
        <link rel="stylesheet" href = "css/semantic.min.css">
        <!--Altertify -->
        <script src="js/alertify.min.js"></script>
        <script>
            alertify.defaults.glossary.title = 'Enigma';
            alertify.defaults.glossary.ok = 'Bevestigen';
            alertify.defaults.glossary.cancel = 'Annuleren';
        </script>
        <script>
            function verwijder(id, Gast) {
                alertify.confirm('Wilt u ' + Gast + ' verwijderen ?',
                        function () {
                            window.location = "?verwijder=" + id + "&Achternaam=" + Gast;
                        },
                        function () {
                            alertify.warning(Gast + ' is niet verwijderd');
                        });
            }
        </script>
        <title>Hotel Enigma</title>
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Hotel Enigma</h1>
            </header>
            <section>
                <?php
                if (isset($_SESSION['alertify'])) {
                    echo '<script>' . $_SESSION['alertify'] . '</script>';
                    $_SESSION['alertify'] = '';
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <p>
                        <label>
                            <span>Zoeken :</span>
                            <input type='text' name='zoeken'>
                        </label>
                    </p>
                    <button type="submit"><img src="./img/page_white_find.png">Zoeken</button>                
                </form>
            </section>
            <section>
                <table border='1' class="centreren">
                    <caption>Index van klanten</caption>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th colspan="3">Actie</th>
                    </tr>
                    <?php
                    if (!$res = $link->query($sql)) {
                        // Er zijn fouten.
                        trigger_error('Fout in query: ' . $link->error);
                    } else {
                        //resultaat terug
                        while ($row = $res->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $row['Voornaam']; ?></td>
                                <td><?php echo $row['Achternaam']; ?></td>
                                <td><a href="./files/engimadetail.php?GastID=<?php echo $row['Gast_ID'] ?>"><img src="./img/page_white_magnify.png"></a></td>
                                <td><a href="./files/engimawijzigen.php?GastID=<?php echo $row['Gast_ID'] ?>"><img src="./img/page_white_edit.png"></a></td>
                                <td><img src="./img/page_white_delete.png" alt="" class="vinger" 
                                         onclick="verwijder(<?php echo $row['Gast_ID'] . ',\'' . $row['Achternaam'] . '\''; ?>)"></td>
                            </tr>
                            <?php
                        endwhile;
                    }
                    echo '<tr><th colspan="5">Aantal records : ' . $res->num_rows . '</th></tr>';
                    ?>
                </table>
            </section>
            <section>
                <div class="centreren">
                    <a href="./index.php?Uitloggen">
                        <button>
                            <img src="./img/door_out.png" alt="Uitloggen">
                            Uitloggen
                        </button>
                    </a>
                    <a href="./files/engimatoevoegen.php">
                        <button>
                            <img src="./img/page_white_add.png" alt="Inloggen">
                            Gast toevoegen
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

