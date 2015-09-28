<?php if (!defined('LOADED')) {
    die;
} ?>

<?php include(__DIR__ . '/../../inc/header.php'); ?>
<h1>Gezondheidsonderzoek resultaten</h1>
<hr>
<p>
    <img style="float: right" src="./tpl4/<?php echo $data['geslacht']; ?>.jpg">
    Naam: <?php echo $data['achternaam']; ?><br>
    Voornaam: <?php echo $data['voornaam']; ?><br>
    Geboortedatum: <?php echo $geboortedatum->format('d-m-Y'); ?> (<?php echo $leeftijd; ?> jaar)<br>
    Geslacht: <?php echo $data['geslacht']; ?>
</p>
<p>
    Gewicht:
<ul>
    <li>
        <?php echo $data['gewicht']; ?> kg
    </li>
    <li>
        <?php echo $gram; ?> gr
    </li>
    <?php if ($conv): ?>
        <li><?php echo $pound; ?> lbs (pounds)</li>
    <?php endif; ?>
</ul>
</p>
<p>
    Lengte:
<ul>
    <li>
        <?php echo $data['lengte']; ?> cm
    </li>
    <li>
        <?php echo $meet; ?> m
    </li>
    <?php if ($conv): ?>
        <li><?php echo $feet; ?> ft (feet)</li>
        <li><?php echo $inch; ?> in (inch)</li>
    <?php endif; ?>
</ul>
</p>
<p>
    BMI: <?php echo $bmi; ?> (<?php echo $bmibij; ?>)<br>
    Vetpercentage: <?php echo $vet ?> &#37;
</p>
<p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Bereken voor ander</a></p>

<?php include(__DIR__ . '/../../inc/footer.php'); ?>
