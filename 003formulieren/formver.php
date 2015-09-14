<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>formverwerking</title>
  </head>
  <body>
    <?php
      $naam = $_POST['naam'];
      $voornaam = $_POST['voornaam'];
      $email = $_POST['email'];
      echo 'Ik ben <b>' .$voornaam. ' ' .$naam. '</b> en mijn E-mail adres is <b>' .$email. '</b>';
    ?>
  </body>
</html>

