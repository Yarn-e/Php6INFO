<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>Webscripting Oef 1</title>
  </head>
  <body>
    <?php
      $hoofdstad = array('DE'=>'Berlijn','BE'=>'Brussel','ES'=>'Madrid','DK'=>'Kopenhagen','FR'=>'Parijs','GB'=>'Londen');
      $landen = array('DE'=>'Duitsland','BE'=>'Belgie','ES'=>'Spanje','DK'=>'Denemarken','FR'=>'Frankrijk','GB'=>'Groot-Brittaine');
      
      echo 'De hoofdstad van <b>'.$landen[DK].'</b> is <b>'.$hoofdstad[DK].'</b>';
                         
    ?>
  </body>
</html>
