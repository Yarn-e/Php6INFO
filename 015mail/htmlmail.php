<?php

$formvelden = array('ontvanger', 'verzender', 'subject', 'message');
$data = array_fill_keys($formvelden, null);
$fouten = array();
$mailtekst = '';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include('./tpl2/mailform.tpl.php');
    exit;
}

foreach ($formvelden as $veld) {
    if (!empty($_POST[$veld])) {
        //weghalen spaties.
        $waarde = trim($_POST[$veld]);
        if (empty($waarde)) {
            $fouten[$veld] = 'Je bent vergeten ' . $veld . ' in te vullen!';
        } else {
            $data[$veld] = $waarde;
        }
    } else {
        $fouten[$veld] = 'Je bent vergeten ' . $veld . ' in te vullen!';
    }
}
if (!empty($data['ontvanger']) && !filter_var($data['ontvanger'], FILTER_VALIDATE_EMAIL)) {
    $fouten['ontvanger'] = 'Het emailadres van de ontvanger klopt niet!';
}

if (!empty($data['verzender']) && !filter_var($data['verzender'], FILTER_VALIDATE_EMAIL)) {
    $fouten['verzender'] = 'Het emailadres van de verzender  klopt niet!';
}

if (count(array_filter($fouten))) {
    include('./tpl2/mailform.tpl.php');
    exit;
}

$to ='To: <' . $data['ontvanger'] . '>';

$from = 'From: YDC <' . $data['verzender'] . '>';
$subject = $data['subject'];
$message = $data['message'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: <' . $data['ontvanger'] . '>' . "\r\n";
$headers .= 'From: <' . $data['verzender'] . '>' . "\r\n";




if (mail($to, $subject, $message, $headers)) {
    $mailtekst = '<hr><br>Mail is verzonden';
    unset($data);
    $data = array_fill_keys($formvelden, null);
    unset($fouten);
    $fouten = array();
} else {
    $mailtekst = '<hr><br>Mail is niet verzonden';
}

include('./tpl2/mailform.tpl.php');
