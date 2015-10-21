<?php
include("credentials.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google-signin-client_id" content="871492745799-3nmcgrpoh6nd6v9bg2932gvj2muc823e.apps.googleusercontent.com">
        <title>PHP</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="./tpl/Facebook/button.css">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script>
            function onSignIn(googleUser) {
                var profile = googleUser.getBasicProfile();
                document.getElementById("IDnr").value = profile.getId();
                document.getElementById("f").submit();
            }
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut();
                window.location.href = 'login.php?signout=true';
            }
        </script>
    </head>
    <body>
        <header>
            <h1>Inloggen</h1>
        </header>
        <section>
            <form method="post" id="f" name="f" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>
                    <label>
                        <span>Gebruikersnaam:</span>
                        <input type="text" name="user" id="users" required>
                    </label>
                </p>
                <p>
                    <label>
                        <span>Wachtwoord:</span>
                        <input type="password" name="pass" id="pass" required>
                    </label>
                </p>
                <p class="centreren">
                    <button type="submit">
                        <img src="../../icons/tick.png">
                        Inloggen
                    </button>
                </p>
                <input type="hidden" name="IDnr" id="IDnr">
            </form>
            <p class="centreren">
            <div id="knop1">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </div>
        </p>
        <?php 
        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // optional
        $loginUrl = $helper->getLoginUrl('http://6info.go-ao.eu/yarne/018sessies/mailer/tpl/login-callback.php', $permissions);
        echo "<p class='centreren'>";
        echo '<a href="' . $loginUrl . '"><button class="uibutton confirm">Inloggen via Facebook</button></a></p>';
        ?>
    </section>
    <footer>
        <h3>&copy; Decuyper Yarne</h3>
    </footer>
</body>
</html>


