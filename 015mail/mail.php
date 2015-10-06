<?php
$to = 'yarnedecuyper@go-ao.eu';
$from = 'From: YDC <decuyperyarne@go-ao.eu>';
$subject = 'Onderwerp van de mail';
$message = 'Beste ontvannger, dit is een testmail';
include('../inc/header.php');
?>
<h1>Mailing</h1>
<hr>
<p>
<?php
if (mail($to, $subject, $message, $from)) {
    echo 'Bericht verzonden';
} else {
    echo 'Bericht niet verzonden';
}
?>
</p>
<?php include('../inc/footer.php'); ?>