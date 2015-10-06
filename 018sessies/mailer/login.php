<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    include('./tpl/form.php');
    exit;
}
//userid en pw
$gebruikercontrole = 'admin';
$pwcontrole = 'VoorBeeld';


//Controle
if (isset($_POST['IDnr'])) {
    echo 'LELEA';
        $_SESSION['logged_in'] = true;
        $_SESSION['ID'] = $_POST['IDnr'];
        header('Location:./files/gmail.php');
        exit();
} else {
    session_destroy();  
    //Foute google user
    header('Location:./files/afmelden.php');
}

if (isset($_GET['signout']) && $_GET['signout'] == TRUE) {
    session_destroy();
}

if (isset($_GET['afmelden']) && $_GET['afmelden']==TRUE)
{
    session_destroy();
    session_start();
}


if (isset($_POST['user'], $_POST['pass'])) {
    $Gebruiker = trim($_POST['user']);
    $Wachtwoord = trim($_POST['pass']);

    if ($Gebruiker == $gebruikercontrole && $Wachtwoord == $pwcontrole) {
        //Juiste user en pw
        $_SESSION['logged_in'] = true;
        $_SESSION['gebruiker'] = $Gebruiker;
        //doorsturen naar beveiligd gedeelte
        header('Location:./files/gmail.php');
    } else {
        //Foute user en pw
        session_destroy();
        header('Location:./login.php');
    }
} else {
    //Foute user en pw
    session_destroy();
    header('Location:./login.php');
}
?>
