<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessies</title>
    </head>
    <body>
        <?php
        session_start();
        echo 'sessie aangemaakt<br>';
        $naam = 'Yern';
        $_SESSION['naam'] = $naam;
        $_SESSION['leeftijd'] = 16;
        echo 'gegevens in sessie gestoken<br>';
        ?>
    </body>
</html>
