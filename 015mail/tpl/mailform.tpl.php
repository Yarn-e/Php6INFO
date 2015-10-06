<?php include('../inc/header.php'); 
?>
<h1>Mailing</h1>
<hr>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label for="naar">Mailen naar:</label>
        <input type="text" name="ontvanger" id="naar" value="<?php echo $data['ontvanger']; ?>">
    </p>
    <p>
        <label for="van">Mail van:</label>
        <input type="text" name="verzender" id="van" value="<?php echo $data['verzender']; ?>">
    </p>
    <p>
        <label for="subject">Onderwerp:</label>
        <input type="text" name="subject" id="subject" value="<?php echo $data['subject']; ?>">
    </p>
    <p>
        <label for="message">Bericht:</label>
        <textarea name="message" id="message" rows="3" cols="20"><?php echo $data['message']; ?></textarea>
    </p>
    <input type="submit" value="Verzenden">
</form>


<?php
if (count($fouten)) {
    include('./tpl/mailfouten.tpl.php');
} else {
    echo $mailtekst;
}
include('../inc/footer.php');
?>

