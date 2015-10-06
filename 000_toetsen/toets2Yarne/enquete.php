<?php
define('LOADED', 'YES');
$days = range(1,31);
$months = range(1,12);
$yearNow = date('Y');
$years = range($yearNow, $yearNow - 75);
$formuliervelden = array('achternaam', 'voornaam', 'dag', 'maand', 'jaar', 'quote', 'niveau', 'geslacht');
//Array met data.
$data = array_fill_keys($formuliervelden, null);
//Array met fouten.
$fouten = array();

//Kijken of post.
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    include('./tpl/form.tpl.php');
    exit;
}

//Fouten checken.
foreach ($formuliervelden as $veld) {
    if (!empty($_POST[$veld])) {
        //weghalen spaties.
        $waarde = trim($_POST[$veld]);
        if(empty($waarde)) {
            $fouten[$veld] = 'Je bent vergeten ' . $veld . ' in te vullen!';
        } else {
            $data[$veld] = $waarde;
        }
    } else {
        $fouten[$veld] = 'Je bent vergeten ' . $veld . ' in te vullen!';
    }
}

if (!checkdate($data['maand'], $data['dag'], $data['jaar'])) {
    $fouten['geboortedatum'] = 'Je geboortedatum is niet geldig';
} else {
    $geboortedatum = new DateTime($data['dag'] . '-' . $data['maand'] . '-' . $data['jaar']);
}

if (empty($_POST['eten1']) && empty($_POST['eten2']) && empty($_POST['eten3'])) {
    $fouten['soorteten'] = 'Je hebt geen favoriete eten aangeduid';
}

//Funcite voor fouten.
function foutstijl($error, $veld) {
    if(!empty($error[$veld])) {
        echo 'error';
    }
}

//Kijken of er fouten zijn.
if (count(array_filter($fouten))) {
    include('./tpl/form.tpl.php');
    exit;
}

//Resultaten tonen
include('./tpl/resultaat.tpl.php');
