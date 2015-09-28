<?php

//foutenarray
$fouten = array();
$formuliervelden = array('naam', 'bedrag', 'percentage', 'maand');
$data = array_fill_keys($formuliervelden, null);
$set = false;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    include('./tpl3/form.tpl.php');
    exit;
}
$set = true;
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
if ((!is_numeric($data['bedrag']) || ($data['bedrag'] < 1)) && !empty($data['bedrag'])) {
    $fouten[] = 'Gelieve een geldig bedrag in te vullen';
    $data['bedrag'] = null;
}

if ((!is_numeric($data['percentage']) || ($data['percentage'] < 1)) && !empty($data['percentage'])) {
    $fouten[] = 'Gelieve een geldig percentage in te vullen';
    $data['percentage'] = null;
}

if ((!is_numeric($data['maand']) || ($data['maand'] < 1)) && !empty($data['maand'])) {
    $fouten[] = 'Gelieve een geldige maand(en) in te vullen';
    $data['maand'] = null;
}

if (count($fouten)) {
    include('./tpl3/form.tpl.php');
    exit;
}

$maandaf = ($data['bedrag'] + ($data['bedrag'] * ($data['percentage'] / 100))) / $data['maand'];
$totaalbed = ($data['bedrag'] + ($data['bedrag'] * ($data['percentage'] / 100)));

include('./tpl3/resultaat.tpl.php');




