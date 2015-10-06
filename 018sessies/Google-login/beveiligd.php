<?php
// We werken ook hier met sessies 
session_start();

// Controleren of de bezoeker ingelogd is 
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html> 
<html lang="nl-be">
    <head>
        <meta charset="utf-8">
        <title>inloggen via Google</title> 
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="871492745799-3nmcgrpoh6nd6v9bg2932gvj2muc823e.apps.googleusercontent.com">
        <script>
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut();
                window.location.href = 'index.php?signout=true';
            }

        </script>
    </head>

    <body> 
        <header>
            <p class="centreren">
            <div id="knop">
                <div class="g-signin2"></div>
            </div>
        </p>
        <h1>Beveiligde pagina</h1>     
    </header>
    <section>
        <?php
        echo "Naam : " . $_SESSION['naam'] . '<br>';
        echo "E-mailadres : " . $_SESSION['email'] . '<br>';
        echo "Google-ID : " . $_SESSION['ID'];
        echo '<br>Foto : <img src="' . $_SESSION['foto'] . '" alt="foto van Google">'
        ?>        
        <br><hr>
        <p class="centreren">
            <button type="button" onclick="signOut()">
                <img src="../../icons/cross.png" alt="">
                Afmelden
            </button>
        </p>
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body> 
</html>
