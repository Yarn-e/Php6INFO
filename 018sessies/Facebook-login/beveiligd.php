<?php 
// We werken ook hier met sessies 
session_start(); 

// Controleren of de bezoeker ingelogd is 

if (!isset($_SESSION['facebook_access_token'])) {
    session_destroy();
    header('Location: index.php'); 
    exit(); 
} 

include("credentials.php");

// Sets the default fallback access token so we don't have to pass it to each request
$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

try {
  $response = $fb->get('/me');
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

?>
<!DOCTYPE html> 
<html lang="nl-be">
<head>
    <meta charset="utf-8">
    <title>inloggen via Facebook</title> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="Facebook/button.css">
</head> 

<body> 
    <header>
        <h1>Beveiligde pagina<br>Facebook gegevens</h1>     
    </header>
    <section>
            <?php     
                echo 'Naam :  ' . $userNode->getName();
                echo '<br>FacebookID :  ' . $userNode->getID();
            ?> 
            <p class="centreren">
                <a href="index.php?afmelden=TRUE">
                    <button type="button">
                        <img src="../../icons/cross.png" alt="">
                        Afmelden
                    </button>
                </a>
            </p>      
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body> 
</html>
