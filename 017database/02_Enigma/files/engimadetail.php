<?php
session_start();
if (!isset($_SESSION['Inlog'])) {
    header('Location:../index.php');
    exit;
}
include('../inc/Verbinding_inc.php');

if (!isset($_GET['GastID'])) {
    header('Location:../engimaindex.php');
    exit;
}

$GastID = $link->real_escape_string($_GET['GastID']);
$sql = 'SELECT * FROM 02_Enigma WHERE Gast_ID=' . $GastID;

if (!$res = $link->query($sql)) {
    // Er zijn fouten.
    trigger_error('Fout in query: ' . $link->error);
} else {
    $row = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Details van <?php echo $row['Voornaam'] . " " . $row['Achternaam']; ?></title>
</head>
<body>
    <header>
        <h1>Details van <?php echo $row['Voornaam'] . " " . $row['Achternaam']; ?></h1>
    </header>
    <section>
        <h1>Details van <?php echo $row['Voornaam'] . " " . $row['Achternaam']; ?></h1>
        <p>Voornaam: <b><?php echo $row['Voornaam']; ?></b></p>
        <p>Achternaam: <b><?php echo $row['Achternaam']; ?></b></p>
        <p>Telefoon: <b><?php echo $row['Telefoon']; ?></b></p>
        <p>Email: <b><?php echo $row['Email']; ?></b></p>
        <p>Gebruikersnaam: <b><?php echo $row['Gebruikersnaam']; ?></b></p>
        <p>Wachtwoord: <b><?php echo $row['Wachtwoord']; ?></b></p>
        <p><a href="../engimaindex.php">Terug naar index</a></p>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>


