<?php if (!defined('LOADED')) {
    die;
} ?>

<?php include(__DIR__ . '/../../inc/header.php'); ?>
<h1>Gezondheidsonderzoek</h1>
<hr>
<form name="f" method="post" action="<?php $_SERVER['PHP_SELF']; ?>"> 
    <p> 
        <label for="achternaam" <?php if(!empty($fouten['achternaam'])): ?>class="error"<?php endif; ?>>Achternaam:</label> 
        <input type="text" name="achternaam" id="achternaam" value="<?php echo $data['achternaam']; ?>"> 
    </p> 
    <p> 
        <label for="voornaam" <?php if(!empty($fouten['voornaam'])): ?>class="error"<?php endif; ?>>Voornaam:</label> 
        <input type="text" name="voornaam" id="voornaam" value="<?php echo $data['voornaam']; ?>"> 
    </p> 
    <p> 
        <label <?php if(!empty($fouten['geboortedatum'])): ?>class="error"<?php endif; ?>>Geboortedatum:</label> 
        <select name="dag">
            <?php foreach ($days as $day): ?>
                <?php if ($day == $daynow): ?>
                    <option value="<?php echo $day; ?>" selected><?php echo $day; ?></option>
                <?php else: ?>
                    <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select> 

        <select name="maand"> 
            <?php foreach ($months as $month): ?>
                <?php if ($month == $monthNow): ?>
                    <option value="<?php echo $month; ?>" selected><?php echo $month; ?></option>
                <?php else: ?>
                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select> 

        <select name="jaar"> 
            <?php foreach ($years as $year): ?>
                <?php if ($year == $yearNow): ?>
                    <option value="<?php echo $year; ?>" selected><?php echo $year; ?></option>
                <?php else: ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select> 
    </p> 
    <p> 
        <label for="gewicht" <?php if(!empty($fouten['gewicht'])): ?>class="error"<?php endif; ?>>Gewicht:</label> 
        <input type="text" name="gewicht" size="4" id="gewicht" value="<?php echo $data['gewicht']; ?>"> kg 
    </p> 
    <p> 
        <label for="lengte" <?php if(!empty($fouten['lengte'])): ?>class="error"<?php endif; ?>>Lengte:</label> 
        <input type="text" name="lengte" size="4" id="lengte" value="<?php echo $data['lengte']; ?>"> cm
    </p> 
    <p>
        <span class="links <?php if(!empty($fouten['geslacht'])): ?>error<?php endif; ?>">Geslacht:</span>
        <input type="radio" value="Man" name="geslacht" id="man" <?php if ($data['geslacht'] == 'Man'): ?>checked<?php endif; ?>>Man
        <input type="radio" value="Vrouw" name="geslacht" id="vrouw" <?php if ($data['geslacht'] == 'Vrouw'): ?>checked<?php endif; ?>>Vrouw
    </p>
    <p>
        <label for="converteren" class="linksgroot">Converteren naar UK maten:</label> 
        <input type="checkbox" name="converteren" id="converteren" value="JA"> (naar pound, inches en feet)
    </p>
    <p> 
        <input type="submit" value="Versturen">
    </p><br>
</form>

<?php if (count($fouten)): ?>
    <?php include('./tpl4/error.tpl.php'); ?>
<?php endif; ?>
<?php include(__DIR__ . '/../../inc/footer.php'); ?>
