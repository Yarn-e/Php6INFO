

<?php
//Session starten.
session_start();
//Controleren of ingelogd.
if (!isset($_SESSION['logged_in'])) {
    header('Location:./../login.php');
    exit;
}


require 'PHPMailerAutoload.php';
$formvelden = array('ontvanger', 'subject', 'message');
$data = array_fill_keys($formvelden, null);
$fouten = array();
$mailtekst = '';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include('./tpl/mailform.tpl.php');
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

if (count(array_filter($fouten))) {
    include('./tpl/mailform.tpl.php');
    exit;
}

$to = $data['ontvanger'];
$subject = $data['subject'];
$message = $data['message'];

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Europe/Brussels');

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "yarnedecuyper@go-ao.eu";

//Password to use for SMTP authentication
$mail->Password = 'Yveran$t01';

//Set who the message is to be sent from
$mail->setFrom('yarnedecuyper@go-ao.eu', 'Decuyper Yarne');

//Set who the message is to be sent to
$mail->addAddress($to, $to);

//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message, dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->AltBody = $message;

//send the message, check for errors
if (!$mail->send()) {
    $mailtekst = "<hr><br>Mailer Error: " . $mail->ErrorInfo;
    unset($data);
    $data = array_fill_keys($formvelden, null);
    unset($fouten);
    $fouten = array();
} else {
    $mailtekst = "<hr><br>Message sent!";
}

include('./tpl/mailform.tpl.php');
