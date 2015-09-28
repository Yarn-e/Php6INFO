<?php

$days = range(1, 31);
$months = range(1, 12);
$yearNow = date('Y');
$years = range($yearNow, $yearNow - 75);

$fouten = array();
//Array me velden van formulier.
$formuliervelden = array('voornaam', 'naam', 'dag', 'maand', 'jaar');
//Array voor data uit post.
$data = array_fill_keys($formuliervelden, null);

// Als geen POST toon formulier.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    //Formulier laten zien
    include('./tpl/form.tpl.php');
    exit;
}
//Formulier verwerken.
//Datavalidatie.
foreach ($formuliervelden as $veld) {
    if (!empty($_POST[$veld])) {
        //Spaties verwijderen.
        $waarde = trim($_POST[$veld]);
        //controle op leeg
        if (!empty($_POST[$waarde])) {
            //Fout
            $fouten[] = 'Je bent vergeten je ' . $veld . ' in te vullen !';
        } else {
            $data[$veld] = $waarde;
        }
    } else {
        //Veld is niet gepost
        $fouten[] = 'Je bent vergeten je ' . $veld . ' in te vullen !';
    }
}

if (!checkdate($data['maand'], $data['dag'], $data['jaar'])) {
    $fouten[] = 'De geboortedatum is niet geldig!';
} else {
    $geboortedatum = new DateTime($data['dag'] . '-' . $data['maand'] . '-' . $data['jaar']);
}

//Als er fouten zijn toon fouten anders resultaat.
if (count($fouten)) {
    include('./tpl/form.tpl.php');
    exit;
}

include('./tpl/resultaat.tpl.php');
