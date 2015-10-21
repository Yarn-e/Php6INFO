<?php
//connectie met database.
include('inc/Verbinding_inc.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['verwijder'])) {
    $id = trim($link->real_escape_string($_GET['verwijder']));
    $land = trim($link->real_escape_string($_GET['land']));
    $sql = "DELETE FROM 01_Landen WHERE Land_ID = $id";
    if (!$res = $link->query($sql)) {
        $_SESSION['altertify'] = 'alertify.error("' . $link->error . '")';
    } else {
        $_SESSION['altertify'] = 'alertify.success("' . $land . ' is succesvol verwijderd")';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['zoeken'])) {
    $zoektekst = trim($link->real_escape_string($_POST['zoeken']));
    $sql = "SELECT Land_ID, Land, Landcode
            FROM 01_Landen
            WHERE Land LIKE '$zoektekst%'
            ORDER BY Land
            ";
} else {
    $sql = 'SELECT Land_ID, Land, Landcode
            FROM 01_Landen
            ORDER BY Land';
}
?>
<!DOCTYPE html>
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
    <script>
        alertify.defaults.glossary.title = 'Landen';
        alertify.defaults.glossary.ok = 'Bevestigen';
        alertify.defaults.glossary.cancel = 'Annuleren';
    </script>
    <script>
        function verwijder(id, land) {
            alertify.confirm('Wilt u ' + land + ' verwijderen ?',
                    function () {
                        window.location = "?verwijder=" + id + "&land=" + land;
                    },
                    function () {
                        alertify.warning(land + ' is niet verwijderd');
                    });
        }
    </script>
    <title>Index van de landen</title>
</head>
<body>
    <?php
    if (isset($_SESSION['alertify'])) {
        echo '<script>' . $_SESSION['alertify'] . '</script>';
        $_SESSION['alertify'] = '';
    }
    ?>
    <header>
        <h1>Landen</h1>
    </header>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <p>
                <label>
                    <span>Zoeken :</span>
                    <input type='text' name='zoeken'>
                </label>
            </p>
                <button type="submit"><img src="../../icons/page_white_find.png">Zoeken</button>                
        </form>
    </section>
    <section>
        <table border='1' class="centreren">
            <caption>Index van de landen</caption>
            <tr>
                <th>Vlag</th>
                <th>Land</th>
                <th colspan="3">Acties</th>
            </tr>
            <?php
            if (!$res = $link->query($sql)) {
                echo '<script>alertify.error("' . $link->error . '");</script>';
                trigger_error('Fout in query: ' . $link->error);
            } else {
                //resultaat terug
                while ($row = $res->fetch_assoc()):
                    ?>
                    <tr>
                        <td><img src="img/<?php echo $row['Landcode']; ?>.png" alt="<?php echo $row['Landcode']; ?>"></td>
                        <td><?php echo $row['Land']; ?></td>
                        <td><a href="landendetail.php?landID=<?php echo $row['Land_ID'] ?>"><img src="img/detail-icon.png"></a></td>
                        <td><a href="landenwijzigen.php?landID=<?php echo $row['Land_ID'] ?>"><img src="../../icons/page_white_edit.png"></a></td>
                        <td><img src="../../icons/page_white_delete.png" alt="" class="vinger" 
                                 onclick="verwijder(<?php echo $row['Land_ID'] . ',\'' . $row['Land'] . '\''; ?>)"></td>
                    </tr>
                    <?php
                endwhile;
            }
            echo '<tr><th colspan="5">Aantal records : ' . $res->num_rows . '</th></tr>';
            ?>
        </table>
    </section>
    <section>
        <a href="./landtoevoegen.php">
            <button>
                <img src="../../icons/page_white_add.png" alt="">
                Land toevoegen
            </button>
        </a>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>

