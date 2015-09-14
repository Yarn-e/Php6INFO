<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>terras verwerking</title>
  </head>
  <body>
    <?php
      
      $tafel = $_POST['tafel'];
      $water = $_POST['water'];
      $frisdrank = $_POST['frisdrank'];
      $bier = $_POST['bier'];
      
      
      $prijzen = array('water'=>1.40,'frisdrank'=>1.40,'bier'=>1.30);
      
      $totwater = $water * $prijzen['water'];
      $totfrisdrank = $frisdrank * $prijzen['frisdrank'];
      $totbier = $bier * $prijzen['bier'];
      
      $totaal = $totbier + $totfrisdrank + $totwater;
      
      
      echo '--------------------------<br>
            Rekening tafel ' .$tafel.'<br>
            --------------------------<br><br>';
      
      echo 'Water: &euro; ' .$totwater. '<br>';
      echo 'Frisdrank : &euro; ' .$totfrisdrank. '<br>';
      echo 'Bier : &euro; ' .$totbier. '<br><br>';
      echo '--------------------------<br>';
      echo 'Totaal = &euro; ' .$totaal;
?>
  </body>
</html>



