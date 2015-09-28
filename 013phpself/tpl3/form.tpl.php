<?php include( __DIR__ . '/../../inc/header.php'); ?>
<h1 class="centreren">Overzicht lening op afbetaling</h1>
<hr>
<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label class="<?php if(empty($data['naam']) && $set) { echo "error";} ?>" for="naam">Naam:</label>
        <input type="text" name="naam" id="naam" value="<?php echo $data['naam']; ?>">
    </p>
    <p>
        <label class="<?php if(empty($data['bedrag']) && $set) { echo "error";} ?>" for="bedrag">Bedrag:</label>
        <input type="number" name="bedrag" id="bedrag" value="<?php echo $data['bedrag']; ?>"> &euro;
    </p>
    <p>
        <label class="<?php if(empty($data['percentage']) && $set) { echo "error";} ?>" for="per">Percentage:</label>
        <input type="text" name="percentage" id="per" value="<?php echo $data['percentage']; ?>"> &percnt;
    </p>
    <p>
        <label class="<?php if(empty($data['maand']) && $set) { echo "error";} ?>" for="maand">Aantal maand:</label>
        <input type="number" name="maand" id="maand" value="<?php echo $data['maand']; ?>"> maand
    </p>
    <p>
        <label for="over">Overzicht zien?</label>
        <input type="checkbox" name="overzicht" value="1" id="over" <?php ?>>
    </p>
    <input type="submit" value="Berkenen">
</form>

<?php if (count($fouten)): ?>
    <?php include('./tpl3/error.tpl.php'); ?>
<?php endif; ?>

<?php include( __DIR__ . '/../../inc/footer.php'); ?>
