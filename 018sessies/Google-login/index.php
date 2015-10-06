<?php
// Controle of het formulier verzonden is 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Controle of benodigde velden wel ingevuld zijn 
    if (isset($_POST['IDnr'], $_POST['naam'], $_POST['email'], $_POST['fotourl'])) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['ID'] = $_POST['IDnr'];
        $_SESSION['naam'] = $_POST['naam'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['foto'] = $_POST['fotourl'];
        header('Location: beveiligd.php');
        exit();
    }
}
if (isset($_GET['signout']) && $_GET['signout'] == TRUE) {
    session_start();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-signin-client_id" content="871492745799-3nmcgrpoh6nd6v9bg2932gvj2muc823e.apps.googleusercontent.com">
        <link href="style.css" rel="Stylesheet" type="text/css">
        <title>Inloggen met googleaccount</title>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script>
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                document.getElementById("IDnr").value = profile.getId();
                document.getElementById("naam").value = profile.getName();
                document.getElementById("email").value = profile.getEmail();
                document.getElementById("fotourl").value = profile.getImageUrl();
                document.getElementById("verborgen").submit();
            }
        </script>
    </head>
    <body>
        <header>
            <h1>Inloggen met je Google Account</h1>
        </header>
        <section>
            <p class="centreren">
            <div id="knop1">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </div>
        </p>
        <form name="verborgen" id="verborgen" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="IDnr" id="IDnr">
            <input type="hidden" name="naam" id="naam">
            <input type="hidden" name="email" id="email">
            <input type="hidden" name="fotourl" id="fotourl">
        </form>
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body>
</html>
