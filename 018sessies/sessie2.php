<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sessies</title>
    </head>
    <body>
        <?php
        session_start();

        echo 'Hoi' . $_SESSION['naam'] . '<br>';
        echo 'Je bent' . $_SESSION['leeftijd'] . 'jaar';
        ?>
    </body>
</html>

