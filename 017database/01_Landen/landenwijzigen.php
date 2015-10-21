<?php
//connectie met database.
include('inc/Verbinding_inc.php');
session_start();

if (($_SERVER['REQUEST_METHOD'] == "GET") && (isset($_GET['landID']))) {
    $id = $link->real_escape_string($_GET['landID']);
    $sql = 'SELECT * FROM 01_Landen WHERE Land_ID =' . $id;

    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
        header('Location:./landindex.php');
        exit();
    } else {
        $row = $res->fetch_assoc();
        $land = $row['Land'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['wijzigid'])) {
    $land = trim($link->real_escape_string($_POST['land']));
    $landcode = trim($link->real_escape_string($_POST['landcode']));
    $hoofdstad = trim($link->real_escape_string($_POST['hoofdstad']));
    $werelddeel = trim($link->real_escape_string($_POST['werelddeel']));
    $inwoners = trim($link->real_escape_string($_POST['inwoners']));
    $land_id = trim($link->real_escape_string($_POST['wijzigid']));
    $sql = "UPDATE 01_Landen SET
           Land = '$land',
           Hoofdstad = '$hoofdstad',
           Werelddeel = '$werelddeel',    
           Inwoners = '$inwoners',
           Landcode = '$landcode'
           WHERE Land_ID = '$land_id'";
    
    if (!$res = $link->query($sql)) {
        $_SESSION['alertify'] = 'alertify.error("' . $link->error . '")';
    } elseif ($link->affected_rows > 0) {
        //Update is gelukt
        $_SESSION['alertify'] = 'alertify.success("' . $land . ' is succesvol gewijzigd")';
    } else {
        $_SESSION['alertify'] = 'alertify.error("Er is geen veld gewijzigd")';
    }
    header('Location:./landindex.php');
    exit();
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Land Wijzigen</title>
</head>
<body>
    <header>
        <h1><?php echo $land; ?> Wijzigen</h1>
    </header>
    <section>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>
                <span>Land:</span>
                <input type="text" name="land" value="<?php echo $row['Land']; ?>" required>
            </label>

            <label>
                <span>Landcode:</span>
                <input type="text" name="landcode" value="<?php echo $row['Landcode']; ?>" required>
                <img class="cent" src="img/<?php echo $row['Landcode']; ?>.png">
            </label>

            <label>
                <span>Hoofdstad:</span>
                <input type="text" name="hoofdstad" value="<?php echo $row['Hoofdstad']; ?>" required>
            </label>

            <label>
                <span>Werelddeel:</span>
                <select name="werelddeel">
                    <option value="Europa" <?php if($row['Werelddeel'] == 'Europa') {echo 'selected';} ?>>Europa</option>
                    <option value="Azië" <?php if($row['Werelddeel'] == 'Azië') {echo 'selected';} ?>>Azi&euml;</option>
                    <option value="Afrika" <?php if($row['Werelddeel'] == 'Afrika') {echo 'selected';} ?>>Afrika</option>
                    <option value="Noord-Amerika" <?php if($row['Werelddeel'] == 'Noord-Amerika') {echo 'selected';} ?>>Noord-Amerika</option>
                    <option value="Zuid-Amerika" <?php if($row['Werelddeel'] == 'Zuid-Amerika') {echo 'selected';} ?>>Zuid-Amerika</option>
                    <option value="Oceanië" <?php if($row['Werelddeel'] == 'Oceanië') {echo 'selected';} ?>>Oceani&euml;</option>
                    <option value="Antarctica" <?php if($row['Werelddeel'] == 'Antarctica') {echo 'selected';} ?>>Antarctica</option>
                </select>
            </label>

            <label>
                <span>Aantal inwoners:</span>
                <input type="number" name="inwoners" value="<?php echo $row['Inwoners']; ?>" required>
            </label><br style="clear:both;">

            <p class="centreren">
                <input type="hidden" name="wijzigid" value="<?php echo $id; ?>">
                <button type="submit">
                    <img src="../../icons/page_white_add.png" alt="">
                    Wijzigen
                </button>
            </p>
            <br style="clear:both;">    
        </form>
    </section>
    <section>
        <p class="centreren">
            <a href="./landindex.php"><button>
                    <img src="../../icons/arrow_left.png" alt="">
                    Terug naar index
                </button>
            </a>
        </p>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>



