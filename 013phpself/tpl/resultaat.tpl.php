<?php include(__DIR__ . '/../../inc/header.php'); ?>

<p>Je hebt het formulier succesvol ingevuld! De volgende gegevens zijn bekend:</p>
<ul>
    <li>Voornaam : <?php echo $data['voornaam']; ?></li>
    <li>Achternaam : <?php echo $data['naam'] ?></li>
    <li>Geboortedatum : <?php echo $geboortedatum->format('d-m-Y'); ?></li>
</ul>

<?php include(__DIR__ . '/../../inc/footer.php'); ?>
