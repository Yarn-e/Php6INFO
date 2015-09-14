<?php
$days = range(1, 31);
$months = range(1, 12);
$yearNow = date('Y');
$years = range($yearNow, $yearNow - 75);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Yarne Decuyper">
        <title>Gegevenschecker</title>
    </head>
    <body>
        <form name="f" method="post" action="gegevenschecker_formver.php">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" id="naam"><br><br>
            <label for="voornaam">Voornaam:</label>
            <input type="text" name="voornaam" id="voornaam"><br><br>
            <input type="submit" name="verzenden" value="Doorgaan">
            <label>Geboortedatum:</label>
            <select name="dag">
                <option value="">- kies -</option>  
                <?php foreach ($days as $day): ?>
                    <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="maand">
                <option value="">- kies -</option>
                <?php foreach ($months as $month): ?>
                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="jaar">
                <option value="">- kies -</option>
                <?php foreach ($years as $year): ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </body>
</html>
