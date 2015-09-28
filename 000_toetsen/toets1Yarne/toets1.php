<?php include(__DIR__ . '/../../inc/header.php'); ?>

<h1> Euro's naar vreemde valuta </h1>
<form name="f" method="post" action="Toets1verwerking.php">
    <label for="naam">Naam :</label>
    <input type="text" name="naam" id="naam"><br><br>
    <label for="euros">Aantal euro's :</label>
    <input type="value" name="euros" id="euros"><br><br>
    <label>Munteenheid :</label>
    <select name="soorten">
        <option value="USD">Amerikaanse Dollar</option>
        <option value="ASD">Australische Dollar</option>
        <option value="GBP">Britse Pond</option>
        <option value="CNY">Chinese Yuan</option>
        <option value="INR">Indian Rupee</option>
        <option value="RUB">Russische Roebel</option>
        <option value="MXN">Mexicaanse Peso</option>
        <option value="CHF">Zwitserse Frank</option>
        <option value="THB">Thaise Bath</option>
        <option value="NOK">Noorse Kroon</option>
    </select>
    <input type="submit" name="verzenden" value="Doorgaan">
</form>

<?php include(__DIR__ . '/../../inc/footer.php'); ?>
