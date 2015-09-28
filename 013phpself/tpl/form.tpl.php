<?php include(__DIR__ . '/../../inc/header.php'); ?>


<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="voornaam">Voornaam:</label>
    <input type="text" name="voornaam" id="voornaam" value="<?php echo $data['voornaam']; ?>"><br><br>
    <label for="naam">Naam:</label>
    <input type="text" name="naam" id="naam" value="<?php echo $data['naam']; ?>"><br><br>
    <label>Geboortedatum:</label>
    <select name="dag">
        <option value="">- kies -</option>  
        <?php foreach ($days as $day): ?>
            <?php if ($day == $data['dag']): ?>
                <option value="<?php echo $day; ?>" selected><?php echo $day; ?></option>
            <?php else: ?>
                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <select name="maand">
        <option value="">- kies -</option>
        <?php foreach ($months as $month): ?>
            <?php if ($month == $data['maand']): ?>
                <option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
            <?php else: ?>
                <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <select name="jaar">
        <option value="">- kies -</option>
        <?php foreach ($years as $year): ?>
            <?php if ($year == $data['jaar']): ?>
                <option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
            <?php else: ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br><br>
    <div class="form_buttons"><input type="submit" name="verzenden" value="Doorgaan"></div>
</form>

<?php if (count($fouten)): ?>
    <?php include(__DIR__ . '/error.tpl.php'); ?>
<?php endif; ?>

<?php include(__DIR__ . '/../../inc/footer.php'); ?>
