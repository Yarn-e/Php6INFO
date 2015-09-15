<?php
//Eerst controleren of formulier verzonden is.
if (!isset($_POST['verzenden'])) {
    header('Location:./gegevenschecker.php');
}

//Variabelen aanmaken.
$fouten = array();
$naam = null;
$voornaam = null;
$geboortedatum = null;
$dag = null;
$maand = null;
$jaar = null;

//Datavalidatie.
if (!empty($_POST['naam'])) {
    $naam = $_POST['naam'];
} else {
    $fouten[] = 'Naam is niet ingevuld!';
}

if (!empty($_POST['voornaam'])) {
    $voornaam = $_POST['voornaam'];
} else {
    $fouten[] = 'Voornaam is niet ingevuld!';
}

if (!empty($_POST['dag'])) {
    $dag = $_POST['dag'];
} else {
    $fouten[] = 'Dag is niet ingevuld!';
}

if (!empty($_POST['maand'])) {
    $maand = $_POST['maand'];
} else {
    $fouten[] = 'Maand is niet ingevuld!';
}

if (!empty($_POST['jaar'])) {
    $jaar = $_POST['jaar'];
} else {
    $fouten[] = 'Jaar is niet ingevuld!';
}

if (!checkdate($maand, $dag, $jaar)) {
    $fouten[] = 'De geboortedatum is niet geldig!';
} else {
    $geboortedatum = new DateTime($jaar . '-' . $maand . '-' . $dag);
}
?>

<?php include('../inc/header.php'); ?>

        <?php if (count($fouten)): ?>

            <ul style="color:red;">
                <?php foreach ($fouten as $fout): ?>
                    <li><?php echo $fout; ?></li>
                <?php endforeach; ?>
            </ul>
            <p><a href="./gegevenschecker.php">Ga terug</a></p>

        <?php else: ?>

            <p>Je hebt het formulier succesvol ingevuld! De volgende gegevens zijn bekend:</p>
            <ul>
                <li>Voornaam : <?php echo $voornaam; ?></li>
                <li>Achternaam : <?php echo $naam; ?></li>
                <li>Geboortedatum : <?php echo $geboortedatum->format('d-m-Y'); ?></li>
            </ul>
            
        <?php endif;
        include('../inc/footer.php');
