<?php
session_start();
if (isset($_GET['afmelden']) && $_GET['afmelden']==TRUE)
{
    session_destroy();
    session_start();
}
include("credentials.php");
?>

<!DOCTYPE html>
<html lang="nl-be">
<head>
    <meta charset="utf-8">
    <title>inloggen via Facebook</title> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="Facebook/button.css">
</head> 

<body> 
    <header>
        <h1>Inloggen via Facebook</h1>     
    </header>
    <section>
        <?php 
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // optional
        $loginUrl = $helper->getLoginUrl('http://6info.go-ao.eu/yarne/018sessies/Facebook-login/login-callback.php', $permissions);

        echo "<p class='centreren'>";
        echo '<a href="' . $loginUrl . '"><button class="uibutton confirm">Inloggen via Facebook</button></a></p>';
        ?>
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body>
</html>
