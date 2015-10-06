<?php
session_start();
include("credentials.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>inloggen via Facebook</title>
    </head>
    <body>
    <header>
        <h1>Inloggen via Facebook</h1>     
    </header>
    <section>
<?php
    
$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  session_destroy();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  session_destroy();
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  header("Location:../files/gmail.php");
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}    
?>  
        <a href="index.php">terug naar inlogpagina</a>
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>              
    </body>
</html>
