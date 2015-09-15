<?php
//Variabelen starten
$naam = $_POST['naam'];
$voornaam = $_POST['voornaam'];
$bericht = $_POST['bericht'];
$datumvandaag = date('Y-m-d');

//Setlocal
setlocale(LC_ALL, 'Dutch_Netherlands', 'Dutch', 'nl_NL', 'nl', 'du', 'nl_NL.ISO8859-1', 'nld_NLD');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yarne Decuyper">
        <title>Formverwerking</title>
    </head>
    <body>
        <p>Beste <b> <?php echo strtoupper($naam) . ' ' . ucwords($voornaam); ?> </b></p>
        <p><i>U plaatste op <?php echo strftime('%A %d %B %Y', strtotime($datumvandaag)); ?> volgend bericht :</i></p>
        <p><?php echo ucwords(nl2br($bericht)); ?></p>
        <p>Uw bericht is <?php echo strlen($bericht); ?> karakters lang</p>
    </body>
</html>
