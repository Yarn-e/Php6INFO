<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Yarne Decuyper">
    <title>Ijsjever</title>
  </head>
  <body>
      <p>Je stelde volgend ijsje samen:</p>
      <ul>
        <?php
           $smaken = $_POST['smaken'];
           foreach ($smaken as $value) {
               echo '<li>' .$value. '</li>';
           }
           $aantal = count($smaken);
           $prijs = $aantal * 1.5;
        ?>  
      </ul>
      <p>Je ijsje kost <strong><?php echo $prijs; ?></strong></p>
        
  </body>
</html>


