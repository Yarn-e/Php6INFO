<?php
//Variabelen starten
$getal1 = $_POST['getal1'];
$getal2 = $_POST['getal2'];
$bewerking = $_POST['bewerking'];

/*
 * @param getal1, getal2, bewerking
 * 
 * @return uitkomst
 */

function berekening($getal1, $getal2, $bewerking) {
    $uitkomst = null;
    switch ($bewerking) {
        case 'som':
            $uitkomst = $getal1 + $getal2;
            break;
        case 'verschil':
            $uitkomst = $getal1 - $getal2;
            break;
        case 'deel':
            if ($getal2 == 0) {
                return('Je kan niet delen door 0!');
            } else {
                $uitkomst = $getal1 / $getal2;
            }
            break;
        case 'maal':
            $uitkomst = $getal1 * $getal2;
            break;
    }
    return(round($uitkomst, 2));
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yarne Decuyper">
        <title>Formverwerking</title>
    </head>
    <body>
        <p>De uitkomst is : <?php echo berekening($getal1, $getal2, $bewerking); ?></p>
        <p><?php include('../011functies/date_copyright.php'); ?></p>
    </body>
</html>


