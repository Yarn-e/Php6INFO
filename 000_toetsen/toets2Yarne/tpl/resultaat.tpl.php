<?php if(!defined('LOADED')) {
    die;
} ?>
<?php include(__DIR__ . '/../../../inc/header.php'); ?>
<h1>Enqu&ecirc;te resultaten</h1>
<hr>
<p>
    Naam: <?php echo $data['achternaam']; ?><br>
    Voornaam: <?php echo $data['voornaam']; ?><br>
    Geboortedatum: <?php echo $geboortedatum->format('d/m/Y'); ?><br>
    Geslacht: <?php echo $data['geslacht']; ?><br>
    Hoogste niveau studies: <?php echo $data['niveau']; ?>
</p>
<p>
    Favoriet eten:
    <ul>
    <?php if(!empty($_POST['eten1'])): ?><li><?php echo $_POST['eten1'] ?></li> <?php endif; ?>
    <?php if(!empty($_POST['eten2'])): ?><li><?php echo $_POST['eten2'] ?></li> <?php endif; ?>
    <?php if(!empty($_POST['eten3'])): ?><li><?php echo $_POST['eten3'] ?></li> <?php endif; ?>
    </ul>
</p>
<p>
    Favoriete quote: <?php echo $data['quote']; ?>
</p>
<?php include(__DIR__ . '/../../../inc/footer.php'); ?>

