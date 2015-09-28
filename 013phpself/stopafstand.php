<?php

$set = true;
$fout1 = false;
$fout2 = false;
$check = false;
//Array voor fouten aanmaken.
$fouten = array();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $set = false;
    //Formulier laten zien
    include('./tpl2/form.tpl.php');
    exit;
}

if (!empty($_POST['snelheid']) && is_numeric($_POST['snelheid'])) {
    $snelheid = $_POST['snelheid'];
} else {
    $fouten[] = 'Gelieve een snelheid in te vullen';
    $fout1 = true;
}

if (!empty($_POST['wegdek'])) {
    $wegdek = $_POST['wegdek'];
    if ($wegdek == "ja") {
        $check = true;
    } else {
        $check = false;
    }
} else {
    $fouten[] = 'Gelieve te selecteren of het wegdek nat is !';
    $fout2 = true;
}
include('./tpl2/form.tpl.php');
