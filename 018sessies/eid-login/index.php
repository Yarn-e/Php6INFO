<!DOCTYPE html> 
<?php
if (isset($_GET['signout']) && $_GET['signout']==TRUE)
{
    session_start(); 
    session_destroy();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 

    session_start();

    include "openid.php";

    function base64url_decode($base64url) {
            $base64 = strtr($base64url, '-_', '+/');
            $plainText = base64_decode($base64);
            return ($plainText);
    }

    $openid = new LightOpenID('mds.go-ao.eu');
    if ($openid->mode) {
    //        echo $openid->validate() ? 'Logged in.' : 'Failed';
            echo ($openid->__get("identity"));
            $attributes = $openid->getAttributes();
            $encodedPhoto = $attributes['eid/photo'];
            $photo = base64url_decode($encodedPhoto);
            $_SESSION['foto'] = $photo;
            $_SESSION['naam'] = $attributes['namePerson'];
            $_SESSION['gebdat'] = $attributes['birthDate'];
            $_SESSION['straat'] = $attributes['contact/postalAddress/home'];
            $_SESSION['postc'] = $attributes['contact/postalCode/home'];
            $_SESSION['woonpl'] = $attributes['contact/city/home'];
            $_SESSION['geslacht'] = $attributes['person/gender'];
            $_SESSION['kaartnr'] = $attributes['eid/card-number'];
            $_SESSION['nat'] = $attributes['eid/nationality'];
            $_SESSION['pob'] = $attributes['eid/pob'];
            $_SESSION['logged_in'] = true; 
            header('Location: beveiligd.php');
    } else {
    /* for $openid->identity = ... you can choose one of those (eid use with or without pincode) : */
    /* https://www.e-contract.be/eid-idp/endpoints/openid/auth-ident */
    /* https://www.e-contract.be/eid-idp/endpoints/openid/auth */
    /* https://www.e-contract.be/eid-idp/endpoints/openid/ident */

            $openid->identity = 'https://www.e-contract.be/eid-idp/endpoints/openid/auth-ident';
            $openid->required = array('namePerson/first', 'namePerson/last',
                    'namePerson', 'person/gender', 'contact/postalCode/home',
                    'contact/postalAddress/home', 'contact/city/home', 'eid/nationality',
                    'eid/pob', 'birthDate', 'eid/card-number', 'eid/photo');
            header('Location: ' . $openid->authUrl());
    }
}

?>
<html lang="nl-be">
<head>
    <meta charset="utf-8">
    <title>inloggen via eID</title> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head> 

<body> 
    <header>
        <h1>Inloggen via E-ID</h1>     
    </header>
    <section>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <p class="centreren"> 
                Klik op het eID-logo om je aan te melden<br>
               <button type="submit">
                   <img src="logo_eid.gif" alt=""/>
               </button> 
            </p> 
        </form> 
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body> 
</html>
