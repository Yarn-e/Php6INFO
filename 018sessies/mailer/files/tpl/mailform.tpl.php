<!DOCTYPE html
    <html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="871492745799-3nmcgrpoh6nd6v9bg2932gvj2muc823e.apps.googleusercontent.com">
    <script>
        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut();
            window.location.href = 'index.php?signout=true';
        }

    </script>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea', menubar: false, statusbar: false});</script>
    <title>Php 6INFO</title>
</head>
<body>
    <header>
        <h1>Mail met Gmail</h1>
        <p class="centreren">
            <div id="knop">
                <div class="g-signin2"></div>
            </div>
        </p>
    </header>
    <section>
        <h1>HTML Mailing</h1>
        <hr>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p>
                <label for="naar">Mailen naar:</label>
                <input type="text" name="ontvanger" id="naar" value="<?php echo $data['ontvanger']; ?>">
            </p>
            <p>
                <label for="subject">Onderwerp:</label>
                <input type="text" name="subject" id="subject" value="<?php echo $data['subject']; ?>">
            </p>
            <p>
                <label for="message">Bericht:</label>
            <div class="textbox">

                <textarea name="message" id="message" rows="3" cols="20"><?php echo $data['message']; ?></textarea>
            </div>
            </p>
            <p class="centreren">
                <button type="submit">
                    Verzenden
                </button>
                <a href="afmelden.php">
                    <button type="button" onclick="signOut()">
                        <img src="../../../icons/cross.png" alt="">
                        Afmelden
                    </button>
                </a>
            </p>
        </form>

        <?php
        if (count($fouten)) {
            include('./tpl/mailfouten.tpl.php');
        } else {
            echo $mailtekst;
        }
        ?>
    </section>
    <footer>
        <h3>&copy; Decuyper Yarne</h3>
    </footer>
</body>
</html>

