<?php
//Array's aanmaken.
$fouten = array();
$geldsoorten = array(
    'USD' => '1.30560',
    'ASD' => '1.27831',
    'GBP' => '0.80646',
    'CNY' => '8.23293 ',
    'INR' => '69.0675',
    'RUB' => '39.1359',
    'MXN' => '17.1695',
    'CHF' => '1.20147',
    'THB' => '40.4582',
    'NOK' => '7.56196',
);
$muntsoort = $_POST['soorten'];
$gekozenmunt = $geldsoorten[$muntsoort];

//Datavalidatie.
if (!isset($_POST['verzenden'])) {
    header('Location:./toets1.php');
}

if (!empty($_POST['naam'])) {
    $naam = $_POST['naam'];
} else {
    $fouten[] = 'Geen naam ingevuld !';
}

if (!empty($_POST['euros'])) {
    $euros = $_POST['euros'];
    $convert = $euros * $gekozenmunt;
} else {
    $fouten[] = 'Geen euros ingevuld !';
}

//Formulier tonen
?>

<?php include(__DIR__ . '/../../inc/header.php'); ?>
<?php if (count($fouten)): ?>
    <ul>
        <?php foreach ($fouten as $fout): ?>
            <li><?php echo $fout; ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="./toets1.php">Ga terug</a></p>
<?php else: ?>
    <p>Hallo <?php echo $naam; ?></p>
    <p><?php echo $euros; ?> &euro; is <?php echo round($convert, 2) . ' ' . $muntsoort; ?></p>
    <p><a href="./toets1.php">Ga terug</a></p>
<?php endif; ?>

<?php include(__DIR__ . '/../../inc/footer.php'); ?>

