<?php
//connectie met database.
include('inc/Verbinding_inc.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //ophalen van gegevens uit post
    $land = $link->real_escape_string($_POST['land']);
    $hoofdstad = $link->real_escape_string($_POST["hoofdstad"]);
    $werelddeel = $link->real_escape_string($_POST["werelddeel"]);
    $inwoners = $link->real_escape_string($_POST["inwoners"]);
    $landcode = $link->real_escape_string($_POST["landcode"]);

    $sql = "INSERT INTO 01_Landen(
                Land,
                Hoofdstad,
                Werelddeel,
                Inwoners,
                Landcode)
            VALUES(
                '$land',
                '$hoofdstad',
                '$werelddeel',
                '$inwoners',
                '$landcode')";
    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
        header('Location:./landindex.php');
        exit();
    } else {
        $_SESSION['alertify'] = 'alertify.success("' . $land . ' is succesvol toegevoegd.")';
        header('Location:./landindex.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Land toevoegen</title>
</head>
<body>
    <header>
        <h1>Land toevoegen</h1>
    </header>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>
                <span>Land:</span>
                <input type="text" name="land" required>
            </label>

            <label>
                <span>Landcode:</span>
                <input type="text" name="landcode" required>
            </label>

            <label>
                <span>Hoofdstad:</span>
                <input type="text" name="hoofdstad" required>
            </label>

            <label>
                <span>Werelddeel:</span>
                <select name="werelddeel">
                    <option value="Europa" selected>Europa</option>
                    <option value="Azië">Azi&euml;</option>
                    <option value="Afrika">Afrika</option>
                    <option value="Noord-Amerika">Noord-Amerika</option>
                    <option value="Zuid-Amerika">Zuid-Amerika</option>
                    <option value="Oceanië">Oceani&euml;</option>
                    <option value="Antarctica">Antarctica</option>
                </select>
            </label>
            
            <label>
                <span>Aantal inwoners:</span>
                <input type="text" name="inwoners" required>
            </label><br style="clear:both;">
            
            <p class="centreren">
                <button type="submit">
                    <img src="../../icons/page_white_add.png" alt="">
                    Toevoegen
                </button>
                <button type="reset">
                    <img src="../../icons/page_white_delete.png" alt="">
                    Formulier leegmaken
                </button>
            </p>
            <br style="clear:both;">    
        </form>
    </section>
    <section>
        <a href="./landindex.php"><button>
                <img src="../../icons/arrow_left.png" alt="">
                Terug naar index
            </button></a>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>


