<?php 
// We werken ook hier met sessies 
session_start(); 

// Controleren of de bezoeker ingelogd is 
if(!isset($_SESSION['logged_in'])) 
{ 
    header('Location: eid-test2.php'); 
    exit(); 
} 
?>
<!DOCTYPE html> 
<html lang="nl-be">
<head>
    <meta charset="utf-8">
    <title>inloggen via eID</title> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
           function signOut() {
                window.location.href = 'index.php?signout=true';
            }
    </script>

</head> 

<body> 
    <header>
        <h1>Beveiligde pagina<br>eID-gegevens</h1>     
    </header>
    <section>
        <?php 
        echo "Naam : " . $_SESSION['naam'];
        echo "<br>Adres : " . $_SESSION['straat'] . " te " . $_SESSION['postc'] . " " . $_SESSION['woonpl'];
        echo "<br>Geboorteplaats en datum : " . $_SESSION['pob'] . ' ' . $_SESSION['gebdat'];
        echo "<br>Geslacht : " . $_SESSION['geslacht'];
        echo "<br>Nationaliteit : " . $_SESSION['nat'];
        echo "<br>eID-kaartnr : " . $_SESSION['kaartnr'];
        echo '<br>Foto : <img src="photo.php"/>'
        ?>        
        <br><hr>
        <p class="centreren">
                    <button type="button" onclick="signOut()">
                        <img src="../../icons/cross.png" alt="" class="klein">
                        Afmelden
                    </button>
        </p>
    </section>
    <footer>
        MDS &copy; 2015-2016
    </footer>
</body> 
</html>
