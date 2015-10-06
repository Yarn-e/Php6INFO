<!DOCTYPE html
    <html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <link href="/yarne/css/style.css" rel="stylesheet" type="text/css">
    <link href='http/fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea', menubar: false, statusbar: false});</script>
    <title>Php 6INFO</title>
</head>
<body>
    <header>
        <h1>Oefeningen PHP van Decuyper Yarne</h1>
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
                <label for="van">Mail van:</label>
                <input type="text" name="verzender" id="van" value="<?php echo $data['verzender']; ?>">
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
            <input type="submit" value="Verzenden">
        </form>


        <?php
        if (count($fouten)) {
            include('./tpl2/mailfouten.tpl.php');
        } else {
            echo $mailtekst;
        }
        include('../inc/footer.php');
        ?>

