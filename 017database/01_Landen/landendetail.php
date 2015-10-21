<?php
include('inc/Verbinding_inc.php');

if (!isset($_GET['landID'])) {
    header('Location:./landindex.php');
    exit;
}

$landID = $link->real_escape_string($_GET['landID']);
$sql = 'SELECT * FROM 01_Landen WHERE Land_ID=' . $landID;

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
    <link href="/yarne/css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Index van de landen</title>
</head>
<body>
    <header>
        <h1>Details van <?php echo $row['Land']; ?></h1>
    </header>
    <section>
            <h1>Details van <?php echo $row['Land']; ?></h1>
            <p>Hoofdstad: <b><?php echo $row['Hoofdstad'];?></b></p>
            <p>Werelddeel: <b><?php echo $row['Werelddeel'];?></b></p>
            <p>Aantal inwoners: <b><?php echo $row['Inwoners'];?></b></p>
            <p><a href="landindex.php">Terug naar index</a></p>
    </section>
    <footer>
        &copy Yarne Decuyper
    </footer>
</body>
</html>

