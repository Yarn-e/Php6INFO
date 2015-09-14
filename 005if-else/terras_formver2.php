<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>terras verwerking</title>
  </head>
  <body>
    <?php
      
      
      
      if(isset($_POST['verzenden'])){
          
          if(isset($_POST['water']) && $_POST['water'] != '') {
              $water = $_POST['water'];
          } else {
              $water = 0;
          }
          
          if(isset($_POST['frisdrank']) && $_POST['frisdrank'] != '') {
              $frisdrank = $_POST['frisdrank'];
          } else {
              $frisdrank = 0;
          }
          
          if(isset($_POST['bier']) && $_POST['bier'] != '') {
              $bier = $_POST['bier'];
          } else {
              $bier = 0;
          }
          
          
          
          
          
          if($water == 0 && $frisdrank == 0 && $bier == 0){
            echo 'Je hebt niets ingevuld !';    
          } else {
              
            $tafel = $_POST['tafel'];  

            $prijzen = array('water'=>1.40,'frisdrank'=>1.40,'bier'=>1.30);

            $totwater = $water * $prijzen['water'];
            $totfrisdrank = $frisdrank * $prijzen['frisdrank'];
            $totbier = $bier * $prijzen['bier'];

            $totaal = $totbier + $totfrisdrank + $totwater; 
              
            echo '--------------------------<br>
                Rekening tafel ' .$tafel.'<br>
                --------------------------<br><br>';  
            
            if($water != 0) {
              echo $water. ' x Water (&euro;1.4) : ' .$totwater. '<br>';
            }
          
            if($frisdrank != 0) {
              echo $frisdrank. ' x Frisdrank(&euro;1.4) : ' .$totfrisdrank. '<br>';
            }
          
            if ($bier != 0) {
              echo $bier. ' x Bier(&euro;1.3) :  ' .$totbier. '<br><br>';
            }  
              
            echo '--------------------------<br>';
            echo 'Totaal = &euro; ' .$totaal;
          }
      } else {
        echo 'Niet alle gegevns zijn ingevuld!';
      }
?>
  </body> 
</html>



