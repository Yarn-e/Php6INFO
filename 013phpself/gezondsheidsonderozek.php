<?php

define('LOADED', 'YES');
$days = range(1, 31);
$months = range(1, 12);
$yearNow = date('Y');
$monthNow = date('m');
$daynow = date('d');
$years = range($yearNow, $yearNow - 75);
//Array me velden van formulier.
$formuliervelden = array('achternaam', 'voornaam', 'dag', 'maand', 'jaar', 'gewicht', 'lengte', 'geslacht');
//Array voor data uit post.
$data = array_fill_keys($formuliervelden, null);
//Array met fouten
$fouten = array();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //Formulier laten zien
    include('./tpl4/form.tpl.php');
    exit;
}
foreach ($formuliervelden as $veld) {
    if (!empty($_POST[$veld])) {
        //Spaties verwijderen.
        $waarde = trim($_POST[$veld]);
        //controle op leeg
        if (empty($waarde)) {
            //Fout
            $fouten[$veld] = 'Je bent vergeten je ' . $veld . ' in te vullen !';
        } else {
            $data[$veld] = $waarde;
        }
    } else {
        //Veld is niet gepost
        $fouten[$veld] = 'Je bent vergeten je ' . $veld . ' in te vullen !';
    }
}

if (!is_numeric($data['gewicht']) && (!empty($data['gewicht']))) {
    $fouten['gewicht'] = 'Gelieve een geldig gewicht in te voeren !';
}

if (!is_numeric($data['lengte']) && (!empty($data['lengte']))) {
    $fouten['lengte'] = 'Gelieve een geldige lengte in te voeren !';
}




if (!checkdate($data['maand'], $data['dag'], $data['jaar'])) {
    $fouten['geboortedatum'] = 'Je geboortedatum is niet geldig!';
} else {
    $geboortedatum = new DateTime($data['dag'] . '-' . $data['maand'] . '-' . $data['jaar']);
}



//Fouten tonen
if (count(array_filter($fouten))) {
    include('./tpl4/form.tpl.php');
    exit;
}

//Resultaat berekenen
//variabelen aanmaaken
$leeftijd = $yearNow - $data['jaar'];
$conv = false;
if (($monthNow < $data['maand']) || (($monthNow == $data['maand']) && ($daynow < $data['dag']))) {
    $leeftijd = $leeftijd - 1;
}

if ($data['geslacht'] == 'Man') {
    $ges = 1;
} else {
    $ges = 0;
}

if (isset($_POST['converteren'])) {
    $conv = true;
}

//Berekening van resultaaten
$gram = round($data['gewicht'] * 1000, 2);
$meet = round($data['lengte'] / 100, 2);
$pound = $data['gewicht'] * 2.2;
$inch = round($data['lengte'] * 0.3937008, 2);
$feet = round($inch / 12, 2);
$bmi = round($data['gewicht'] / ($meet * 2), 1);
$vet = round(($bmi * 1.2) + ($leeftijd * 0.23) - ($ges * 10.78) - 5.4, 2);

//soort BMI berekenen
if ($bmi < 18.4) {
    $bmibij = 'Ondergewicht';
} elseif ($bmi < 24.9) {
    $bmibij = 'Normaal';
} elseif ($bmi < 29.9) {
    $bmibij = 'Overgewicht';
} else {
    $bmibij = 'Obesitas';
}


include('./tpl4/resultaat.tpl.php');
