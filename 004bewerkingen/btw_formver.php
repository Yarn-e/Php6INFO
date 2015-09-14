<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>BTW verwerking</title>
  </head>
  <body>
    <?php
      $naam = $_POST['naamArtikel'];
      $getal1 = $_POST['artikelBTW'];
      $btwtarief = $_POST['tarief'];
      
      $totaal = $getal1 + ($getal1*$btwtarief/100);
      $totaal= round($totaal,2);
      
      echo 'Je hebt volgend artikel gekocht: <b>' .$naam. '</b><br>';
      echo 'Dit artikel kost ' .$getal1. ' euro zonder BTW, er wordt '
            .$btwtarief. ' % op geheven en kost tenslotte ' .$totaal. ' euro.';
        
    ?>
  </body>
</html>

